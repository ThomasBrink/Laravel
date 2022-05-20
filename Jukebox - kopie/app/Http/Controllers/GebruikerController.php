<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gebruiker;
//use App\Models\gebruikers;

class GebruikerController extends Controller
{
    public function showGebruikers(){
        $gebruikers = Gebruiker::all();

        return view('gebruikers', [
            'gebruikers' => $gebruikers 
        ]);
    }

    public function createGebruiker(){
        return view('create');
    }

    public function saveGebruiker(){
        $gebruikers = new Gebruiker();

        $gebruikers->naam = request('naam');
        $gebruikers->wachtwoord = request('wachtwoord');

        $gebruikers->save();

        return redirect('/');
    }

    public function showSingleGebruiker(){
        //$gebruikers = Gebruiker::all();
        error_log($gebruikers);
    }

    public function gebruikerlogin(){
        $gebruikersnaam = request('gebruikersnaam');
        $wachtwoord = request('wachtwoord');

        $gebruiker = Gebruiker::where('naam', $gebruikersnaam)->where('wachtwoord', $wachtwoord)->get();

        return view('logincheck', [
            'gebruiker' => $gebruiker
        ]);
    }
}
