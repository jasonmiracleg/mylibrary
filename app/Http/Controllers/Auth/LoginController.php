<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => '1',
            'is_active' => '1'
        ];

        $editor = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => '2',
            'is_active' => '1'
        ];

        $member = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => '3',
            'is_active' => '1'
        ];

        if (Auth::attempt($admin)) {
            $this->isLogin(Auth::id());
            return redirect()->route('library');
        } else  if (Auth::attempt($admin)) {
            $this->isLogin(Auth::id());
            return redirect()->route('library');
        } else if (Auth::attempt($member)) {
            return redirect()->route('library');
        }
        return redirect()->route('login');
    }

    private function isLogin(int $id)
    {
        $user = User::findOrFail($id);
        return $user->update(['is_login' => '1']);
    }

    public function logout(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'is_login' => '0'
        ]);
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('login');
    }
}
