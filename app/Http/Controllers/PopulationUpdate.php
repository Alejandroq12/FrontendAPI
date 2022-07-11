<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PopulationUpdate extends Controller
{
    public function update(Request $request){
        $request->validate([
            'id' => 'numeric',
            "states" => "min:2|string",
            "total_population" => "min:2|string",
            "vaccinated_population" => "min:2|string",
            "unvaccinated_population" => "min:2|string",
        ]);

        $response = Http::put("http://127.0.0.1:8000/api/population/{$request->id}", $request->all());
        if($response->status() == 202){
            return redirect('/states')->with('message','Population updated succesfully');
        }
    }

    public function destroy(Request $data){
        $data->validate(['id' => 'numeric']);
        Http::delete("http://127.0.0.1:8000/api/population/{$data->id}");
        return redirect('states')->with('response', 'Population succesfully deleted!');
    }

    public function get($id){
        $population = Http::get("http://127.0.0.1:8000/api/population/$id");
        return view("state_update",[
            "state" => $population->object()
        ]);
    }
}
