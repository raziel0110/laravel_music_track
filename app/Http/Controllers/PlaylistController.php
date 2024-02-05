<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::where('user_id', Auth::user());

        return view('playlists.index', ['playlists' => $playlists]);
    }

    public function create(Request $request)
    {
    }
}
