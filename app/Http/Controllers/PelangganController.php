<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Golongan;
use App\Models\User;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::with(['golongan', 'user'])->paginate(10);
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $golongan = Golongan::all();
        $users = User::all();
        return view('pelanggan.create', compact('golongan', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pel_id_gol' => 'required|exists:tb_golongan,gol_id',
            'pel_id_user' => 'required|exists:tb_users,user_id',
            'pel_no' => 'required|unique:tb_pelanggan,pel_no|max:20',
            'pel_nama' => 'required|max:50',
            'pel_alamat' => 'required',
            'pel_hp' => 'nullable|max:20',
            'pel_ktp' => 'nullable|max:20',
            'pel_seri' => 'required|max:50',
            'pel_meteran' => 'required|integer',
            'pel_aktif' => 'required|in:Y,N',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::with(['golongan', 'user'])->findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $golongan = Golongan::all();
        $users = User::all();
        return view('pelanggan.edit', compact('pelanggan', 'golongan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'pel_id_gol' => 'required|exists:tb_golongan,gol_id',
            'pel_id_user' => 'required|exists:tb_users,user_id',
            'pel_no' => 'required|unique:tb_pelanggan,pel_no,' . $id . ',pel_id|max:20',
            'pel_nama' => 'required|max:50',
            'pel_alamat' => 'required',
            'pel_hp' => 'nullable|max:20',
            'pel_ktp' => 'nullable|max:20',
            'pel_seri' => 'required|max:50',
            'pel_meteran' => 'required|integer',
            'pel_aktif' => 'required|in:Y,N',
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus.');
    }
}
