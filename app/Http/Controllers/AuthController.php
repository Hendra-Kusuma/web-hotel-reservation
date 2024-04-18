<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //

    public function registerPage(){
        return view('auth/register');
    } 

    public function register(Request $request){
        // dd($request);
        try {
            $request->validate([
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|max:10'
            ]);
    
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('/login')->with('success', 'new account has been created, please login!😋');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function loginPage(){
        return view('auth/login');
    }

    public function login(Request $request){
        try {
            if(!$request){
                return response()->json(['message'=>'please input all data'], 404);
            }
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:5|max:10'
            ]);
            $cekUser = User::where('email', $request->email)->first();
            if (!$cekUser) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email not found',
                ], 401);
            }
            
            // Jika user ditemukan, lakukan pengecekan password
            if (!Hash::check($request->password, $cekUser->password)) {
                return redirect('/login')->with('error', 'password invalid');
            } 

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $cekUser->createToken('api_token')->plainTextToken;

                // Simpan token di local storage menggunakan JavaScript
                // echo "<script>window.localStorage.setItem('api_token', '{$token}')</script>";

                // Redirect pengguna ke halaman home
                return redirect('/home')->with('success', 'Welcome Back!🤠🚀 ' . Auth::user()->name);
            } else {
                // Jika otentikasi gagal, kembalikan ke halaman login dengan pesan error
                return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    return redirect ('/login');
    }
}
