<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\playlists;
use App\Models\playlist;
use App\Models\Lists;
use App\Models\Songs;

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
}
