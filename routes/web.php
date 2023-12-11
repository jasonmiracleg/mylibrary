<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

// php artisan route:list

Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin', // Differentiate the route
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::get('/sales', [SalesController::class, 'index'])->name('sales');
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
});
Route::get('/create', [BookController::class, 'create'])->middleware('auth')->name('book.create');
Route::get('/library', [BookController::class, 'index'])->middleware('auth')->name('library');
Route::get('/library/{writer}', [BookController::class, 'show'])->middleware('auth'/*change into certain role if the page is intended specifically to certain role*/);
Route::post('/store', [BookController::class, 'store'])->name('store');
Route::get('/library/edit/{book}', [BookController::class, 'edit'])->middleware('auth')->name('edit');
Route::put('/library/update/{book}', [BookController::class, 'update'])->middleware('auth')->name('update');
Route::delete('/libray/destroy/{book}', [BookController::class, 'destroy'])->middleware('auth')->name('destroy');;

Route::group([
    'middleware' => 'editor',
    'prefix' => 'editor', // Differentiate the route
    'as' => 'editor.',
    'namespace' => 'Editor'
], function () {
    Route::get('/shop', [EditorShopController::class, 'index'])->name('shop');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
