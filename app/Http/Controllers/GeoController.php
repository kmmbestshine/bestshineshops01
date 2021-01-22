<?php

namespace App\Http\Controllers;

class GeoController extends Controller
{
    public function index(){

        // Getting latitude and longitude from user browser

        $latitude = request('latitude');
        $longitude = request('longitude');


        // Your Google API Key

        $api_key = 'AIzaSyAraCT6ZV1QmDH36IlgjjU0m2BJxMDc3_Q'; // Get your Google Maps API key

        // Google API URL for getting response

        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitude,$longitude&key=$api_key";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);


        // Full response is here :)

        $api_response = json_decode ($response, true);
        

        // I am showing very few data to our user
       // $username = Auth::user()->username;
       // $username = isset(Auth::user()->username) ? Auth::user()->username] : null;
        $address = isset($api_response['results'][0]['formatted_address']) ? $api_response['results'][0]['formatted_address'] : null;
        $district = isset($api_response['results'][0]['address_components'][3]['long_name']) ? $api_response['results'][0]['address_components'][3]['long_name'] : null;
        $full_address = isset($api_response['results'][1]['formatted_address']) ? $api_response['results'][1]['formatted_address'] : null;
        $division = isset($api_response['results'][6]['address_components'][3]['long_name']) ? $api_response['results'][6]['address_components'][3]['long_name'] : null;

        return response()->json(['address' => $address, 'district' => $district, 'full_address' => $full_address, 'division' => $division]);
    }

     public function tracklocation(){
       return view('backend.serviceorder.WO.tracklocation');
     }
}
