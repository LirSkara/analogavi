<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome(){
        return view('welcome');
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
