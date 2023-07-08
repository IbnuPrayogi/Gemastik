<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MapController extends Controller
{
    public function index()
    {
        $jsonMap = Pelaporan::all();
        $jsonData = [
            'type' => 'FeatureCollection',
            'features' => []
        ];
        foreach ($jsonMap as $key => $value) {
            $jsonData['features'][] = [
                'type' => 'Feature',
                'properties' => [
                    'name' => $value->nama_lokasi,
                    'description' => $value->nama_company,
                    'links' => '/pelaporan' . Str::of($value->id)->prepend('/'),
                    'status' => $value->status
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$value->latitude, $value->longitude]
                ]
            ];
        }
        $jsonData = json_encode($jsonData);
        return view('map.index', compact('jsonData'));
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
