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
        if(auth()->user()->id_roles == 11){
            $jsonMap = Pelaporan::all();
        }else if(auth()->user()->id_roles == 99){
            $jsonMap = Pelaporan::where('unique_id',auth()->user()->id)->get();
        }
        $jsonData = [
            'type' => 'FeatureCollection',
            'features' => []
        ];
        foreach ($jsonMap as $key => $value) {
            $jsonData['features'][] = [
                'type' => 'Feature',
                'properties' => [
                    'name' => Str::limit($value->nama_lokasi, 10),
                    'description' => $value->nama_company,
                    'links' => '/laporan/' . Str::of($value->id),
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

    public function next()
    {
        if(auth()->user()->id_roles == 11){
            $jsonMap = Pelaporan::all();
        }else if(auth()->user()->id_roles == 99){
            $jsonMap = Pelaporan::where('unique_id',auth()->user()->id)->get();
        }
        $jsonData = [
            'type' => 'FeatureCollection',
            'features' => []
        ];
        foreach ($jsonMap as $key => $value) {
            $jsonData['features'][] = [
                'type' => 'Feature',
                'properties' => [
                    'name' => Str::limit($value->nama_lokasi, 10),
                    'description' => $value->nama_company,
                    'links' => '/laporan/' . Str::of($value->id),
                    'status' => $value->status,
                    'panjang_perbaikan' => $value->panjang_perbaikan,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$value->latitude, $value->longitude]
                ]
            ];
        }
        $jsonData = json_encode($jsonData);
        return view('map.next', compact('jsonData'));
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
