<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\GenresController;

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

Route::get('/', [HomeController::class, 'index']);


Route::get('/gebruikers/create', [GebruikerController::class, 'createGebruiker']);
Route::post('/gebruikers', [GebruikerController::class, 'saveGebruiker']);
Route::get('/gebruikers', [GebruikerController::class, 'showGebruikers']);
Route::get('/gebruikers/{id?}', [GebruikerController::class, 'showSingleGebruiker']);


Route::get('/genres', [GenresController::class, 'showGenres']);
Route::get('/genres/{genre}', [GenresController::class, 'showGenreSongs']);
Route::get('/genres/{genre}/{songId}', [GenresController::class, 'showSongsDetail']);

//Route::get('')