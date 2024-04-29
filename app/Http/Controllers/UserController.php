<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::paginate(10);
        return view('users/user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users/create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|max:10',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'credit_balance'=> 'required',
                'role'=>'required'
            ]);

            $image = $request->file('image')->store('images');
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $image,
                'credit_balance'=> $request->credit_balance,
                'role'=>$request->role
            ]);

            $user->assignRole('user');

            return redirect('/user')->with('success', 'User created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function edit($id)
    {
        //
        $users = User::find($id);
        return view('users/edit-user', compact('users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $request->validate([
                'name' => 'unique:users',
                'email' => 'email|unique:users',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'credit_balance' => 'required',
                'role'=>'required'
            ]);

            $user = User::find($id);
    
            // Lakukan perubahan pada atribut hotel
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->credit_balance = $request->credit_balance;
            $user->role = $request->role;
            
    
            // Periksa apakah file gambar baru diunggah
            if ($request->hasFile('image')) {
                // Hapus file gambar lama
                Storage::delete($user->image);
                // Simpan file gambar yang baru
                $imageUrl = $request->file('image')->store('images');
                $user->image = $imageUrl;
            } else {
                $user->image = $user->image;
            }
            $user->save();

            return redirect('/user')->with('success', 'User created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user')->with('success', 'User deleted successfully');
        //
    }
}
