<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreateVaccine extends Controller
{
    function index(){
        return view('create_vaccine');
    }

    function register(Request $data){
        $data->validate([
            'vaccineName' => 'required|max:20',
            'availableQuantity' => 'required|numeric',
            'vaccineType' => 'required|max:20',
            'vaccineCreator' => 'required|string'
        ]);

        Http::asForm()->post('http://127.0.0.1:8000/api/vaccines',[
            'vaccine_name' => $data->vaccineName,
            'available_quantity' => $data->availableQuantity,
            'vaccine_type' => $data->vaccineType,
            'vaccine_creator' => $data->vaccineCreator
        ]);

        return redirect('vaccines')->with('response', 'Vaccine succesfully added!');
    }
}
