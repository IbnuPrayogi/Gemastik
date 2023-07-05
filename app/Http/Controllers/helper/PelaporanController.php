<?php

namespace App\Http\Controllers\helper;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Pelaporan;
use Illuminate\Support\Facades\Hash;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelaporans=Pelaporan::all();
        return view('pelaporan.index',compact('pelaporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelaporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'required|mimes:jpeg,png,jpg,gif|max:5120 ',
        ]);
        
        $file = $validatedData[('foto')];
        $filename =  $file->getClientOriginalName();
      
        $location = '../public/assets/images/';
        Pelaporan::create([
            'unique_id' => 1,
            'nama_proyek' => $request->nama_proyek,
            'nama_lokasi' => $request->nama_lokasi,
            'nama_company' => $request->nama_company,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'foto'=>$filename,
            'tgl_start' => $request->tgl_start,
            'tgl_end' => $request->tgl_end,
        ]);

        $file->move(public_path($location), $filename);
        // Session::flash('success', 'Data User Berhasil Ditambahkan');
        return view('pelaporan.create');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
