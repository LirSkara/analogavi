<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Realty;
use App\Models\RealtyImage;
use App\Models\Rooms;

class HomeController extends Controller
{
    public function welcome(){
        $realty = Realty::all();
        $rooms = Rooms::all();
        return view('welcome', ['realty' => $realty, 'rooms' => $rooms]);
    }
    public function estate(){
        return view('estate');
    }
    public function cars(){
        return view('cars');
    }
    public function job(){
        return view('job');
    }
    public function items(){
        return view('items');
    }
    public function sotr(){
        return view('sotr');
    }
}
