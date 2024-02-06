<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::where('user_id', Auth::user());

        return view('playlists.index', ['playlists' => $playlists]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'max:255']
        ]);

        Playlist::create(['user_id' => $user->id, 'name' => $request->name]);

        return Redirect::route('playlists.index')->with('status', 'playlist-created');
    }
}
