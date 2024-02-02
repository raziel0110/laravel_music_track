<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
  public function index()
  {
    // dd(url(public_path('/songs/Alina-Eremia-x-Mario-Fresh-Ai-fo.mp3')));
    $songs = Song::all();
    return view('songs.index', ['songs' => $songs]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'files' => 'max:300000'
    ]);

    $files = [];

    if($request->file('files')) {
      foreach($request->file('files') as $file) {
        $originalName = $file->getClientOriginalName();
        $file->move(public_path('songs'), $originalName);
        $files[]['name'] = $originalName;
      }
    }

    foreach($files as $key => $file) {
      Song::create($file);
    }

    return back()->with('success', 'You have successfully uploaded file');
  }

  public function songs()
  {
    $songs = Song::all();

    $paths = [];

    foreach($songs as $song) {
      $song['path'] = url(('/songs/'.$song->name));
      $paths[] = $song;
    }

    return response()->json($songs, 200);
  }
}
