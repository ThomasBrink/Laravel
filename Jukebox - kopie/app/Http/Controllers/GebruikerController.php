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

    public function gebruikerlogin(Request $request){
        $gebruiker = Gebruiker::where('naam', $request->get('gebruikersnaam'))->where('wachtwoord', $request->get('wachtwoord'))->get();

        return view('logincheck', [
            'gebruiker' => $gebruiker
        ]);
    }
}
