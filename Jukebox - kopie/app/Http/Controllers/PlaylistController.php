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
        $songs = playlists::where('listId', $listId)->get();
        /*
        error_log($songs[0]->duur);

        $totaleDuur = $songs[0]->duur . $songs[1]->songduur; 

        error_log($songs[0]->duur);
        error_log($totaleDuur);
        */
        //totale duur

        return view('playlistDetail', [
            'songs' => $songs,
            'listId' => $listId
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
        //Session::push('SessionPlaylist', 'jez');
        /*
        dd(
            Session::all('SessionPlaylist') 
        );
        */
        //$genres = Genres::all();
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

        //return redirect("/SessionPlaylist");

        /*
        dd(
            Session::all('SessionPlaylist') 
        );*/
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

    public function showSaveSession($userId){
        $SessionPlaylist = Session::get('SessionPlaylist');

        $lists = new Lists();

        $lists->listnaam = 'SessionPlaylist';
        $lists->listduur = 'lekker lang';
        $lists->userId = Request('userId');

        $SessionList = $lists;

        //$lists->save();

        return view('saveSessionPlaylist', [
            'SessionPlaylist' => $SessionPlaylist,
            'lists' => $SessionList,
            'userId' => $userId
        ]);

    }
}
