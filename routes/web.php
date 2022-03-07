<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::get('/', [ FilmController::class, 'index' ])->name("welcome");

Route::get('/profile', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.index');
Route::get('/profile/following', [App\Http\Controllers\ProfilesController::class, 'following'])->name('profile.following');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

//Route::get('/film/{filmId}', [App\Http\Controllers\FilmController::class, 'show'])->name('film.show');
//Route::post('/film/{filmId}/store', [App\Http\Controllers\FilmController::class, 'save'])->name('film.store');
Route::post('/film/{film}/addtofavourites', [App\Http\Controllers\FilmController::class, 'addToFavourites'])->name('film.addtofavourites');
Route::delete('/film/{film}/removeFromFavourites', [App\Http\Controllers\FilmController::class, 'removeFromFavourites'])->name('film.removeFromFavourites');
Route::resource('film', FilmController::class);
Auth::routes();
