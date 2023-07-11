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
        $users = User::all();
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
        $user = User::create([
            'id_roles' => $request->id_roles,
            'nama_company' => $request->nama_company,
            'nama_pemilik' => $request->nama_pemilik,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => "Ready",
        ]);
        return redirect('/admin/user/'.$user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        $tittle = 'Detail User ' . $users->nama_company;
        return view('user.read', compact('users', 'tittle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        $tittle = 'Edit User ' . $users->nama_company;
        return view('user.update', compact('users', 'tittle'));
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
        $users = User::find($id);
        $users->delete();
        return redirect()->back();
    }

    // reset password
    public function reset(string $id)
    {
        $reset = User::find($id);
        $reset->password = Hash::make('password');
        $reset->save();
        $users = User::find($id);

        $tittle = 'Reset Password ' . $users->nama_company;
        return view('user.update', compact('users', 'tittle'));
    }
}
