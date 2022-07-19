<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function reg(){
        return view('reg');
    }
    
    public function login_p(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required']
        ]);
    
        if (auth('web')->attempt($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->withErrors([
                'email' => 'Email или пароль введены неверно!'
            ]);
        }
    }

    public function reg_p(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'name' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'password' => ['required', 'confirmed']
        ]);
    
        $user = User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'tel' => $data['tel'],
            'password' => bcrypt($data['password']),
        ]);
    
        if ($user) {
            auth('web')->login($user);
        }
    
        return redirect()->route('home');
    }

    public function cabinet(){
        return view('cabinet');
    }

    public function user_info(){
        return view('user_info');
    }

    public function my_adv(){
        return view('my_adv');
    }

    public function favorites(){
        return view('favorites');
    }

    public function exit(){
        auth('web')->logout();
        return redirect()->route('home');
    }
}
