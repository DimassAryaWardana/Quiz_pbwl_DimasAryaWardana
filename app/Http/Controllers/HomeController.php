<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Golongan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel users, pelanggan, dan golongan
        $users = User::all();
        $pelanggan = Pelanggan::all();
        $golongan = Golongan::all();
        
        // Kirim data ke view
        return view('home', compact('users', 'pelanggan', 'golongan'));
    }
}
