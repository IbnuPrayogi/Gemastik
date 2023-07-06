<?php

namespace App\Http\Controllers\helper;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_users' => 'required|mimes:jpeg,png,jpg,gif|max:5120 ',
        ]);
        
        $file = $validatedData[('image_users')];
        $filename =  $file->getClientOriginalName();
      
        $location = '../public/assets/images/profil/';
        User::create([
            'id_roles' => $request->id_roles,
            'nama_company' => $request->nama_company,
            'nama_pemilik' => $request->nama_pemilik,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image_users' => $filename,
            'rekening'=>$request->rekening,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        $file->move(public_path($location), $filename);
        // Session::flash('success', 'Data User Berhasil Ditambahkan');
        return view('user.create');
        //
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
        $users=User::where('id',$id)->first();
        return view('user.update',compact('users'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();
        $user->nama_company = $request->input('nama_company');
        $user->nama_pemilik = $request->input('nama_pemilik');
        $user->id_roles = $request->input('id_roles');
        $user->email = $request->input('email');
        $user->rekening = $request->input('rekening');
        $user->email = $request->input('email');
        $user->status = $request->input('status');
        $user->save();

        $users=User::all();

        return view('user.index',compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
