<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Signout extends Controller
{
    public function signOut(){
        session()->forget('auth');
        return redirect('/');
    }
}
