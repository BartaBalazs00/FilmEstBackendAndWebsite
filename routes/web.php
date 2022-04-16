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

Route::get('/profile', [App\Http\Controllers\ProfilesController::class, 'index'])->middleware('verified')->name('profile.index');

Route::get('/profile/search-user', [App\Http\Controllers\ProfilesController::class, "search"])->name("user.search");
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'show'])->middleware('verified')->name('profile.show');

Route::get('/profile/{user}/following', [App\Http\Controllers\ProfilesController::class, 'following'])->middleware('verified')->name('profile.following');
Route::get('/profile/{user}/followers', [App\Http\Controllers\ProfilesController::class, 'followers'])->middleware('verified')->name('profile.followers');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->middleware('verified')->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->middleware('verified')->name('profile.update');

//Route::get('/film/{filmId}', [App\Http\Controllers\FilmController::class, 'show'])->name('film.show');
//Route::post('/film/{filmId}/store', [App\Http\Controllers\FilmController::class, 'save'])->name('film.store');
Route::post('/film/{film}/addtofavourites', [App\Http\Controllers\FilmController::class, 'addToFavourites'])->name('film.addtofavourites');
Route::delete('/film/{film}/removeFromFavourites', [App\Http\Controllers\FilmController::class, 'removeFromFavourites'])->name('film.removeFromFavourites');
Route::resource('film', FilmController::class);

//Route::post('/search-film', [App\Http\Controllers\FilmController::class, "search"])->name("search");
Route::get('/search-film', [App\Http\Controllers\FilmController::class, "search"])->name("film.search");

Auth::routes(['verify' => true]);
