<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index()
    {
        return view('maps.index');
    }

    public function saveCoordinates(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        
        // Save the latitude and longitude to your MySQL database
        // You can use the DB facade or Eloquent ORM to save the coordinates
        // Example:
        DB::table('pelaporan')->insert(['latitude' => $latitude, 'longitude' => $longitude]);
        
        return response()->json(['success' => true]);
    }
}
