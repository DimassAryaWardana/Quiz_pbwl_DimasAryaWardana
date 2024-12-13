<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golongan = Golongan::paginate(10);
        return view('golongan.index', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gol_kode' => 'required|string|max:10|unique:tb_golongan,gol_kode',
            'gol_nama' => 'required|string|max:50',
        ]);

        Golongan::create([
            'gol_kode' => $request->gol_kode,
            'gol_nama' => $request->gol_nama,
        ]);

        return redirect()->route('golongan.index')->with('success', 'Data golongan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.show', compact('golongan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.edit', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $golongan = Golongan::findOrFail($id);

        $request->validate([
            'gol_kode' => 'required|string|max:10|unique:tb_golongan,gol_kode,' . $id . ',gol_id',
            'gol_nama' => 'required|string|max:50',
        ]);

        $golongan->update([
            'gol_kode' => $request->gol_kode,
            'gol_nama' => $request->gol_nama,
        ]);

        return redirect()->route('golongan.index')->with('success', 'Data golongan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $golongan = Golongan::findOrFail($id);
        $golongan->delete();

        return redirect()->route('golongan.index')->with('success', 'Data golongan berhasil dihapus.');
    }
}
