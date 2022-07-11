<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StateController extends Controller
{
    public function states(Request $request){
        $states = Http::get("http://127.0.0.1:8000/api/population/states/{$request->city}");
        if($states->status() == 200){
            $populations = $states->object();
            return redirect("states")->with(compact("populations"));
        }
    }
}
