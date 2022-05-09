<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GebruikerController;

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

