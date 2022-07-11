<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreatePopulation extends Controller
{
    function index(){
        return view('create_population');
    }

    function register(Request $data){
        $data->validate([
            'state' => 'required|string',
            'total_population' => 'required|numeric',
            'unvaccinated_population' => 'required|numeric',
            'vaccinated_population' => 'required|numeric'
        ]);

        Http::asForm()->post('http://127.0.0.1:8000/api/population',[
            'states' => $data->state,
            'total_population' => $data->total_population,
            'unvaccinated_population' => $data->unvaccinated_population,
            'vaccinated_population' => $data->vaccinated_population
        ]);

        return redirect('/states')->with('response', 'Register succesfully created!');
    }
}
