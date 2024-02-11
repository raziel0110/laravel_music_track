<?php

namespace App\Http\Controllers;

use App\Models\User;
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


    public function playlists()
    {
        $user = User::find(1);

        $playlists = Playlist::where('user_id', $user->id)->get();

        return response()->json(['playlists' => $playlists], 200);
    }

    public function apiCreate(Request $request)
    {
        $user = User::find(1);

        $request->validate([
            'name' => ['required', 'max:255']
        ]);

        $activePlaylist = Playlist::where('active',  true)->first();

        if($activePlaylist) {
            $activePlaylist->update(['active' => false]);
        }

        $playlist = Playlist::create (['user_id' => $user->id, 'name' => $request->name, 'active' => true]);

        return response()->json(['playlist' => $playlist], 201);
    }

    public function apiDestroy($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();

        if ($playlist->isActive() === true) {
            $pl = Playlist::orderBy('id', 'desc')->first();
            $pl->update(['active' => true]);
        }

        return response()->json(["mesasge" => 'ok'], 200);
    }
}
