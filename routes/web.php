<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SalesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index', [
        "pagetitle" => "My Library",
        "maintitle" => "This is My Library",
        "activeHome" => "active"
    ]);
});

// Route::get('/about', function () {
//     return view('about');
// });

Route::view(
    '/about',
    'about',
    [
        "pagetitle" => "About Us",
        "maintitle" => "About My Library",
        "activeAbout" => "active"
    ]
);

Route::view(
    '/contact',
    'contact',
    [
        "pagetitle" => "Contact Us",
        "maintitle" => "Contact Us",
        "activeContact" => "active"
    ]
);

Route::get('/library', [BookController::class, 'index'])->middleware('auth')->name('library');
Route::get('/library/{writer}', [BookController::class, 'show'])->middleware('auth');
Route::get('/shop', [ShopController::class, 'index'])->middleware('auth')->name('shop');
Route::get('/sales', [SalesController::class, 'index'])->middleware('auth')->name('sales');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
