<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gebruiker;
use App\Models\Lists;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        
        Session::put('SessionPlaylist', []);

        $SessionPlaylist = Session::all('SessionPlaylist');
        
        return view('index');
    }

    public function jukebox($userId){
        $Lists = Lists::where('userId', $userId)->get();

        return view('jukebox',  [
            'Lists' => $Lists,
            'userId' => $userId
        ]);
    }
}
