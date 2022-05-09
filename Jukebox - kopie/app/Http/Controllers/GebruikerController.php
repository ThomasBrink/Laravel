<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gebruiker;

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
        $gebruikers = new Gebuiker();

        $gebruiker->naam = request('naam');
        $gebruiker->wachtwoord = request('wachtwoord');

        error_log($gebruiker);

        return redirect('/');
    }
}
