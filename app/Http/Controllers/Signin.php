<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Signin extends Controller
{
    function index(){
        
        if(session()->get('auth')){
            return redirect('/');
        }

        return view('signin');
    }
    
    function authenticate(Request $data){
        $data->validate([
            'email' => 'email|required|max:255',
            'password' => 'required|alpha_num|max:30',
        ]);

        $response = Http::asForm()->post('http://127.0.0.1:8000/api/login',[
            'email' => $data->email,
            'password' => $data->password
        ]);

        $response = json_decode($response,true);

        if(isset($response['access_token'])){
            session(['auth' => true]);
            return redirect('/');
        }
        
        elseif(isset($response['message'])){
            return view('signin',['loginError' => $response['message']]);
        }
    }
}
