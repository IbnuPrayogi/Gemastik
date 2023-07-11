<?php

namespace App\Http\Controllers\helper;

use App\Models\User;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->id_roles == 11) {
            $pelaporans=Pelaporan::all();
        }else if (Auth::user()->id_roles == 99) {
            $pelaporans=Pelaporan::where('unique_id',Auth::user()->id)->get();
        }
        return view('pelaporan.index',compact('pelaporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->id_roles == 99) {
            return view('pelaporan.create');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|mimes:jpeg,png,jpg,gif|max:10280 ',
        ]);
        // store pohot
        $foto = $request->file('foto');
        $foto->storeAs('public/images', $foto->hashName());

        // validasi tanggal start
        $postDate = Carbon::now();
        $userDate = Carbon::parse($request->tgl_start);
        $minutesDifference = $userDate->diffInMinutes($postDate);
        if ($minutesDifference <= 60) {
            $tgl_start = $request->tgl_start;
        } else {
            $tgl_start = Carbon::now();
        }

        // coordinate expoloder
        $data = $request->coordinates;
        $coordinates = explode(",", $data);

        $longitude = $coordinates[0];
        $latitude = $coordinates[1];
        Pelaporan::create([
            'unique_id' => Auth::user()->id,
            'panjang_perbaikan' => $request->panjang_perbaikan,
            'lebar_perbaikan' => $request->lebar_perbaikan,
            'nama_lokasi' => $request->nama_lokasi,
            'nama_company' => Auth::user()->nama_company,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'foto'=>$foto->hashName(),
            'tgl_start' => $tgl_start,
            'tgl_end' => null,
            'status' => "1",
        ]);
        // Session::flash('success', 'Data User Berhasil Ditambahkan');
        return redirect()->route('client.laporan.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pelaporan = Pelaporan::findOrFail($id);
            return view('pelaporan.read', compact('pelaporan'));
        } catch (ModelNotFoundException $e){
            return redirect()->route('pelaporan.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $pelaporan = Pelaporan::findOrFail($id);
            return view('pelaporan.update', compact('pelaporan'));
        } catch (ModelNotFoundException $e){
            return redirect()->route('pelaporan.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelaporan = Pelaporan::where('id', $id)->first();
        $pelaporan->nama_proyek = $request->input('nama_proyek');
        $pelaporan->nama_lokasi = $request->input('nama_lokasi');
        $pelaporan->nama_company = $request->input('nama_company');
        $pelaporan->longitude = $request->input('longitude');
        $pelaporan->latitude = $request->input('latitude');
        $pelaporan->tgl_end = $request->input('tgl_end');
        $pelaporan->save();

        return view('pelaporan.index');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pelaporan::where('id', $id)->first();
        $data->delete();

        return redirect()->back();
    }
}
