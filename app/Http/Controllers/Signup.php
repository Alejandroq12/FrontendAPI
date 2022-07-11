<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;


class Signup extends Controller
{
    function index(){
        if(session()->get('auth')){
            return redirect('/');
        }
        return view('signup');
    }

    function register(Request $data){
        
        $data->validate([
            'name' => 'required|string|max:20|min:5',
            'email' => 'required|email|max:255',
            'password' => 'required|alpha_num|max:30|min:8',
        ]);

        $response = Http::asForm()->post('http://127.0.0.1:8000/api/register',[
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password
        ]);

        $response = json_decode($response,true);

        if(isset($response['access_token'])){
            return redirect('signin');
        }

        if(isset($response['email'][0])){
            return redirect('signup')->with('emailError', $response['email'][0]);
        }
    }
}
