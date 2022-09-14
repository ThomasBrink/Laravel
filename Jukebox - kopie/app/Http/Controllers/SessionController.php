<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\playlists;
use App\Models\playlist;
use App\Models\Lists;
use App\Models\Songs;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function showSessionPlaylist($userId){
        $songs = Songs::all();

        $SessionPlaylist = Session::get('SessionPlaylist');

        dump($SessionPlaylist);

        return view('SessionPlaylist', [
            'Songs' => $songs,
            'userId' => $userId,
            'SessionPlaylist' => $SessionPlaylist
        ]);
    }

    public function addSessionSong($userId){
        $newSong = Request('songs');

        Session::push('SessionPlaylist', $newSong);

        $SessionPlaylist = Session::all('SessionPlaylist');

        return redirect('/SessionPlaylist/'. $userId);
    }

    public function addSessionPlaylist(){
        $songNaam = Session::get('SessionPlaylist'); 

        $songNaamCount = count($songNaam);

        $lists = new Lists();

        $lists->listnaam = Request('playlistnaam');
        $lists->listduur = 'lekker lang';
        $lists->userId = Request('userId');

        $SessionList = $lists;

        $lists->save();

        

        for($i = 0; $i < $songNaamCount; $i++){
            $Songduur = Songs::where('songNaam', $songNaam[$i])->get();

            $playlists = new Playlists();

            $playlists->listId = $SessionList->id;
            $playlists->song = $songNaam[$i];
            $playlists->duur = $Songduur[0]->songduur;

            $playlists->save();
        }

        return redirect('/forget');
    }

    public function forgetSession(){
        Session::forget('SessionPlaylist');
    }
}
