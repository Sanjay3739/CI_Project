<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CountryCityController extends Controller
{
    public function fetchCity(Request $request)
    { 
        //fetch the api through city and country, with using script
        
        $data['cities'] = City::where("country_id", $request->country_id)
            ->orderBy('name')
            ->get(['name', 'city_id']);

        return response()->json($data);
    }
}
