<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

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
    return view('welcome');
});
// Home route
Route::get('/home', [ComicController::class, 'index'])->name('home');

// Route for displaying comics (new updates)
Route::get('/comics', [ComicController::class, 'getComics'])->name('comics.index');
// Route for displaying a specific comic
Route::get('/comics/{id}', [ComicController::class, 'show'])->name('comics.show');
// Route for About page
Route::get('/about', function () {
    return view('about'); // Make sure to create the about.blade.php view file
})->name('about');

// Route for Contact page
Route::get('/contact', function () {
    return view('contact'); // Make sure to create the contact.blade.php view file
})->name('contact');
Route::get('/comics/{id}/chapter', [ComicController::class, 'showChapter'])->name('comics.chapter');