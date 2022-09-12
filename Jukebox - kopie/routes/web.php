<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\PlaylistController;

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
Route::get('/jukebox/{id}', [HomeController::class, 'jukebox']);

Route::post('/', [GebruikerController::class, 'gebruikerlogin']);
Route::get('/gebruikers/create', [GebruikerController::class, 'createGebruiker']);
Route::post('/gebruikers', [GebruikerController::class, 'saveGebruiker']);
Route::get('/gebruikers', [GebruikerController::class, 'showGebruikers']);

Route::get('/genres/{userId}', [GenresController::class, 'showGenres']);
Route::get('/genres/{userId}/{genre}', [GenresController::class, 'showGenreSongs']);
Route::get('/genres/{userId}/{genre}/{songId}', [GenresController::class, 'showSongsDetail']);

Route::get('/playlist/create/{userId}', [PlaylistController::class, 'createPlaylist']);
Route::get('/playlist', [PlaylistController::class, 'showPlaylists']);
Route::get('/playlist/deletelist/{playlistId}', [PlaylistController::class, 'deleteList']);
Route::get('/playlist/delete/{playlistId}', [PlaylistController::class, 'deleteSong']);
Route::post('/songadd', [PlaylistController::class, 'addSong']);
Route::post('/addplaylist', [PlaylistController::class, 'addplaylist']);
Route::get('/songDelete/{id}/{listId}', [PlaylistController::class, 'songDelete']);
Route::get('/playlist/{listId}', [PlaylistController::class, 'showPlaylistDetail']);
Route::post('/updatePlaylist', [PlaylistController::class, 'updatePlaylist']);

Route::get('/SessionPlaylist/{userId}', [PlaylistController::class, 'showSessionPlaylist']);
Route::post('/sessionSongAdd/{userId}', [PlaylistController::class, 'addSessionSong']);
Route::post('/addSessionPlaylist', [PlaylistController::class, 'addSessionPlaylist']);

Route::get('/forget', [PlaylistController::class, 'forgetSession']);