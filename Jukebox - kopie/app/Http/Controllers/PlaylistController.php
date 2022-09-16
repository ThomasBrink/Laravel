<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\playlists;
use App\Models\playlist;
use App\Models\Lists;
use App\Models\Songs;
use Illuminate\Support\Facades\Session;

class PlaylistController extends Controller
{
    public function showPlaylists(){// haalt alle playlist uit de database en returnt ze naar de view
        $lists = Lists::all();

        return view('playlists', [
            'lists' => $lists
        ]);
    }

    public function showPlaylistDetail($listId){// haalt playlist uit de database van de juiste gebruiker en haalt bijbehoorende songs op en return ze naar de view
        $lists = Lists::where('id', $listId)->get();
        $songs = playlists::where('listId', $listId)->get();

        $totaleDuur;
        $num = 0;
        $totalTime = [0,0,0];

        for($i = 0; $i<count($songs); $i++){
            $num = explode(':', $songs[$i]->duur);

            for($a = 0; $a<count($totalTime); $a++){
                $totalTime[$a] = $totalTime[$a] + $num[$a];
            }
            if($totalTime[2] > 60){
                $totalTime[2] = $totalTime[2] - 60;
                $totalTime[1] = $totalTime[1] + 1;
            }
        }
        
        return view('playlistDetail', [
            'songs' => $songs,
            'listId' => $listId,
            'totalTime' => $totalTime,
            'lists' => $lists
        ]);
    }

    public function addSong(){//reqeust infomatie uit de form en maakt een nieuwe playlist aan met de infomatie die de gebruiker wilt
        $playlists = new Playlists();

        $playlists->listId = Request("listId");
        $playlists->song = Request('song');
        $playlists->duur = Request('duur');
        

        $playlists->save();

        return redirect('/');
    }

    public function addplaylist(){//voegt een song toe aan de playlist die de gebruiker wilt updaten met de songs die de gebruiker invult
        $lists = new Lists();

        $lists->listnaam = Request('playlistnaam');
        $lists->listduur = 'lekker lang';
        $lists->userId = Request('userId');

        $lists->save();

        $userId = Request('userId');

        return redirect('/');
    }

    public function deleteList($id){//verwijdert playlist uit de database die de gebruiker niet meer wilt en haalt de bijbehoorende songs uit de database
        playlists::where('listId', $id)->delete();
        Lists::where('id', $id)->delete();

        return redirect('/');
    }

    public function songDelete($id, $listId){// verwijdert een song uit een playlist van de gebruiker
        $song = playlists::where('id', $id)->where('listId', $listId);

        $song->delete();

        return redirect('/');
    }

    public function createPlaylist($userId){ //maakt een playlist aan voor de bebruiker

        return view('createPlaylist', [
            'userId' => $userId
        ]);
    }


    public function updatePlaylist(){//update de naam van een bestaande playlist met de naam die de gebruiker invoerd
        $listId = Request('listId');

        $playlistnaam = Request('playlistnaam');

        lists::where('id', $listId)->update(['listnaam' => $playlistnaam]);

        return redirect('/playlist/' . $listId);
    }

}
    
