<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;
use App\Models\Songs;
use App\Models\Playlists;
use App\Models\Lists;

class GenresController extends Controller
{
    public function showGenres($userId){
        $genres = Genres::all();

        return view('genres', [
            'Genres' => $genres,
            'userId' => $userId
        ]);
    }

    public function showGenreSongs($Genre, $userId){
        $songs = Songs::where('songsgenre', $Genre)->get();

        error_log($songs);

        return view('songs', [
            'Songs' => $songs,
            'userId' => $userId
        ]);
    }

    public function showSongsDetail($Genre, $SongId, $userId){
        $song = Songs::where('id', $SongId)->get();
        $lists = Lists::where('userId', $userId)->get();

        return view('songsdetail', [
            'Song' => $song,
            'Lists' => $lists,
            'userId' => $userId
        ]);
    }
}
