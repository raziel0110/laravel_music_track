<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\TokenController;
use App\Models\Playlist;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/song', [SongController::class, 'index'])->name('song.index');
    Route::post('/song', [SongController::class, 'store'])->name('song.store');

    Route::post('/update-token', [TokenController::class, 'update'])->name('token.update');

    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::post('/playlists', [PlaylistController::class, 'create'])->name('playlists.create');
});

require __DIR__.'/auth.php';
