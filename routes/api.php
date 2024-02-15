<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/songs', [SongController::class, 'songs']);
Route::get('/playlists', [PlaylistController::class, 'playlists']);
Route::post('/playlists', [PlaylistController::class, 'apiCreate']);
Route::delete('/playlists/{id}', [PlaylistController::class, 'apiDestroy']);
Route::post('/playlist/{id}', [PlaylistController::class, 'apiAddSongToPlaylist']);
Route::delete('/playlist/{id}', [PlaylistController::class, 'apiRemoveSongFromPlaylist']);
