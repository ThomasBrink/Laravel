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
    public function showPlaylists(){
        $lists = Lists::all();

        return view('playlists', [
            'lists' => $lists
        ]);
    }

    public function showPlaylistDetail($listId){
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
        }
        
        return view('playlistDetail', [
            'songs' => $songs,
            'listId' => $listId,
            'totalTime' => $totalTime,
            'lists' => $lists
        ]);
    }

    public function addSong(){
        $playlists = new Playlists();

        $playlists->listId = Request("listId");
        $playlists->song = Request('song');
        $playlists->duur = Request('duur');
        

        $playlists->save();

        return redirect('/');
    }

    public function addplaylist(){
        $lists = new Lists();

        $lists->listnaam = Request('playlistnaam');
        $lists->listduur = 'lekker lang';
        $lists->userId = Request('userId');

        $lists->save();

        $userId = Request('userId');

        return redirect('/');
    }

    public function deleteList($id){
        playlists::where('listId', $id)->delete();
        Lists::where('id', $id)->delete();

        return redirect('/');
    }

    public function songDelete($id, $listId){
        $song = playlists::where('id', $id)->where('listId', $listId);

        $song->delete();

        return redirect('/');
    }

    public function createPlaylist($userId){

        return view('createPlaylist', [
            'userId' => $userId
        ]);
    }

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

    public function updatePlaylist(){
        $listId = Request('listId');

        $playlistnaam = Request('playlistnaam');

        lists::where('id', $listId)->update(['listnaam' => $playlistnaam]);

        return redirect('/playlist/' . $listId);
    }

}
    
