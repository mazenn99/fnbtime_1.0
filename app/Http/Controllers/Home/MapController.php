<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Restaurant;
use \DCarbone\XMLWriterPlus;
use App\Http\Controllers\Controller;

class MapController extends Controller
{

    /*
    Get restaurants by city
       */
    public function Get_Restaurants(Request $request){

        $city = $request->input('city');
        $city=urldecode($city);


        $search = $request->input('search');
        $search=urldecode($search);

        $filter = $request->input('sort');
        $filter=urldecode($filter);
        
        $limit = $request->input('limit');
        $limit=urldecode($limit);



        $query = Restaurant::select('restaurants.id','restaurants.name as restaurant_name','restaurants.description','restaurants.map_url',
            'restaurants.type_food','cities.name as city_name', 'countries.name as country_name')
            ->join('cities','restaurants.city_id', '=', 'cities.id')
            ->join('countries', 'restaurants.country_id', '=', 'countries.id');

        if (!empty($city)){
            $query->where('cities.name','like','%'.$city.'%');
        }

      


        if(count($query->get()) == 0) {
            $query = Restaurant::select('restaurants.id','restaurants.name as restaurant_name','restaurants.description','restaurants.map_url',
            'restaurants.type_food','cities.name as city_name', 'countries.name as country_name')
            ->join('cities','restaurants.city_id', '=', 'cities.id')
            ->join('countries', 'restaurants.country_id', '=', 'countries.id');
        }
        
          if (!empty($search) && $search != "null" ){
            $query->where('restaurants.name','like','%'.$search.'%');
        }
        
        if(!empty($filter) && $filter != "null"){
            $query->where('type_food', 'LIKE', '%' . $filter . '%');
        }
        
         
        
        
        
        if(!empty($limit) && $limit != "null"){
            $query->limit($limit);
            $restaurants = $query->inRandomOrder()->get();
        }else{
            $restaurants = $query->orderBy('restaurants.id', 'ASC')->paginate(8);
        }
        $data=self::parseToXML($restaurants);
        
        return response($data)->header('Content-Type', 'text/xml');
    }


    public function Get_ById(Request $request) {
        $id = $request->input('id');
        $restaurants =DB::table('restaurants')
            ->join('cities','restaurants.city_id', '=', 'cities.id')
            ->join('countries', 'restaurants.country_id', '=', 'countries.id')
            ->select('restaurants.id','restaurants.name as restaurant_name','restaurants.description','restaurants.map_url','restaurants.type_food',
                'cities.name as city_name', 'countries.name as country_name')
            ->where('restaurants.id',$id)
            ->get();


        $data=self::parseToXML($restaurants);

        return response($data)->header('Content-Type', 'text/xml');
    }




   


    public function parseToXML($restaurants) {
        $xml = new XMLWriterPlus();
        $xml->openMemory();
        // $xml->startDocument();
        $xml->startElement('restaurants');
        foreach($restaurants as $restaurant) {
            $xml->startElement('restaurant');
            $xml->writeAttribute('id', $restaurant->id);
            $xml->writeAttribute('name', $restaurant->restaurant_name);
            $xml->writeAttribute('description', $restaurant->description);
            $xml->writeAttribute('city', $restaurant->city_name);
            $xml->writeAttribute('country', $restaurant->country_name);
            $xml->writeAttribute('foodType', $restaurant->type_food);
            $xml->writeAttribute('url', $restaurant->map_url);
            $xml->endElement();
        }
        $xml->endElement();
        $xml->endDocument();

        return  $xml->outputMemory();
    }

    /*
    Google Maps Images (bypass image restriction)
    */
    public function Get_image(Request $request) {
        $url = $request->input('img');
        $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        $output = curl_exec($ch);
        curl_close($ch);

        return response($output);

    }
}

