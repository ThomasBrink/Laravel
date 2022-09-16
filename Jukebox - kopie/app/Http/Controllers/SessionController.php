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
        $SessionPlaylist = Session::get('SessionPlaylist');

        $songSave = [];
        $totaleDuur;
        $num = 0;
        $totalTime = [0,0,0];
        $count = 0;

        if($SessionPlaylist != NULL){
            $count = count($SessionPlaylist);
        }

        for($i = 0; $i<$count; $i++){
            $songs = Songs::where('songNaam', $SessionPlaylist[$i])->get('songDuur');


            $songSave[$i] = $songs[0]->songDuur;
        }

        for($i = 0; $i<$count; $i++){
            $num = explode(':', $songSave[$i]);

            for($a = 0; $a<count($totalTime); $a++){
                $totalTime[$a] = $totalTime[$a] + $num[$a];
            }
            if($totalTime[2] > 60){
                $totalTime[2] = $totalTime[2] - 60;
                $totalTime[1] = $totalTime[1] + 1;
            }
        }

        dump($SessionPlaylist);

        return view('SessionPlaylist', [
            //'Songs' => $song,
            'userId' => $userId,
            'SessionPlaylist' => $SessionPlaylist,
            'totalTime' => $totalTime
        ]);
    }

    public function addSessionSong($userId){
        $newSong = Request('songs');

        Session::push('SessionPlaylist', $newSong);

        $SessionPlaylist = Session::all('SessionPlaylist');

        return redirect('/SessionPlaylist/'. $userId);
    }

    public function addSessionPlaylist($userId){
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

        return redirect('/forget/' .$userId);
    }

    public function forgetSession($userId){
        Session::forget('SessionPlaylist');

        return redirect('/jukebox/' .$userId);
    }
}
