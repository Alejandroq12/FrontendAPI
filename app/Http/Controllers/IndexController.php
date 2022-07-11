<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index(){
        return view("index");
    }
    public function returnViewVaccines(){
        $vaccines = Http::get("http://127.0.0.1:8000/api/vaccines");
        return view("vaccines",[
            "vaccines" => $vaccines->object(),
        ]);
    }
    public function returnViewStates(){
        $populations = Http::get("http://127.0.0.1:8000/api/populations");
        return view("states",[
            "populations" => $populations->object()
        ]);
    }
}
