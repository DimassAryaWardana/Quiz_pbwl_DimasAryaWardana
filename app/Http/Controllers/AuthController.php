<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email|max:50|unique:tb_users',
            'user_password' => 'required|min:6',
            'user_nama' => 'required|max:100',
            'user_alamat' => 'required',
            'user_hp' => 'required|max:25',
            'user_pos' => 'required|max:5',
        ]);

        DB::table('tb_users')->insert([
            'user_email' => $request->user_email,
            'user_password' => Hash::make($request->user_password),
            'user_nama' => $request->user_nama,
            'user_alamat' => $request->user_alamat,
            'user_hp' => $request->user_hp,
            'user_pos' => $request->user_pos,
            'user_role' => 2, // Default role, e.g., 2 for regular users
            'user_aktif' => 1, // Default active status
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Registration successful');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required',
        ]);

        $credentials = [
            'user_email' => $request->user_email,
            'password' => $request->user_password,
        ];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->user_aktif !== 1) {
                Auth::logout();
                return back()->with('error', 'Account is inactive');
            }
    
            return redirect('/home')->with('success', 'Login successful');
        }
    
        return back()->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
