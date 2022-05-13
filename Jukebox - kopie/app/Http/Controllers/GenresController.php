<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;
use App\Models\Songs;

class GenresController extends Controller
{
    public function showGenres(){
        $genres = Genres::all();

        return view('genres', [
            'Genres' => $genres
        ]);
    }

    public function showGenreSongs($Genre){
        $songs = Songs::where('songsgenre', $Genre)->get();

        return view('songs', [
            'Songs' => $songs
        ]);
    }

    public function showSongsDetail($Genre, $SongId){
        $song = Songs::where('id', $SongId)->get();

        return view('songsdetail', [
            'Song' => $song
        ]);
    }
}
