<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gebruiker;// probleem zit hier kan (ontvindtbaar): https://www.youtube.com/watch?v=iaXtpAYfiy4

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
}
