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
        $user = Auth::user();

        $playlists = Playlist::where('user_id', $user->id)->get();

        return view('playlists.index', ['playlists' => $playlists]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'max:255']
        ]);

        $activePlaylist = Playlist::where('active',  true)->first();

        if($activePlaylist) {
            $activePlaylist->update(['active' => false]);
        }

        Playlist::create (['user_id' => $user->id, 'name' => $request->name, 'active' => true]);

        return Redirect::route('playlists.index')->with('status', 'playlist-created');
    }

    public function destroy($id)
    {
        $playlist = Playlist::find($id);

        $playlist->delete();

        return Redirect::route('playlists.index')->with('status', 'playlist-destroy');
    }
}
