<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all();

        return view('playlists.index', ['playlists' => $playlists]);
    }

    public function create(Request $request)
    {

    }
}
