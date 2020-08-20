<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Country;
use Illuminate\Http\Request;

class DropDownControllerForCountryAndCity extends Controller
{
    public function getCityList(Request $request)
    {
        $cities = City::where('country_id' , $request->input('country'))->get()->pluck('name','id');
        return response()->json($cities);
    }
}
