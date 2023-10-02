<?php

use Illuminate\Support\Facades\Route;

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
        "maintitle" => "This is My Library"
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
        "maintitle" => "About My Library"
    ]
);

Route::view(
    '/contact',
    'contact',
    [
        "pagetitle" => "Contact Us",
        "maintitle" => "Contact Us"
    ]
);
