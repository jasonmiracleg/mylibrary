<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Editor\ShopController as EditorShopController;

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
Route::get('/library/{writer}', [BookController::class, 'show'])->middleware('auth'/*change into certain role if the page is intended specifically to certain role*/);

Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin', // Differentiate the route
    'as' => 'admin.'
], function () {
    Route::get('/shop', [ShopController::class, 'index'])->middleware('auth')->name('shop');
    Route::get('/sales', [SalesController::class, 'index'])->middleware('auth')->name('sales');
});

Route::group([
    'middleware' => 'editor',
    'prefix' => 'editor', // Differentiate the route
    'as' => 'editor.'
], function () {
    Route::get('/shop', [EditorShopController::class, 'index'])->middleware('auth')->name('shop');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
