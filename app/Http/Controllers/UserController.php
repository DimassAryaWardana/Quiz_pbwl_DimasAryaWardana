<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email|unique:tb_users,user_email|max:50',
            'user_password' => 'required|min:6|max:100',
            'user_nama' => 'required|max:100',
            'user_alamat' => 'required',
            'user_hp' => 'nullable|max:25',
            'user_pos' => 'nullable|max:5',
            'user_role' => 'required|integer|in:1,2',
            'user_aktif' => 'required|integer|in:0,1',
        ]);

        User::create([
            'user_email' => $request->user_email,
            'user_password' => bcrypt($request->user_password),
            'user_nama' => $request->user_nama,
            'user_alamat' => $request->user_alamat,
            'user_hp' => $request->user_hp,
            'user_pos' => $request->user_pos,
            'user_role' => $request->user_role,
            'user_aktif' => $request->user_aktif,
        ]);

        return redirect()->route('users.index')->with('success', 'Data user berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'user_email' => 'required|email|unique:tb_users,user_email,' . $id . ',user_id|max:50',
            'user_password' => 'nullable|min:6|max:100',
            'user_nama' => 'required|max:100',
            'user_alamat' => 'required',
            'user_hp' => 'nullable|max:25',
            'user_pos' => 'nullable|max:5',
            'user_role' => 'required|integer|in:1,2',
            'user_aktif' => 'required|integer|in:0,1',
        ]);

        $data = $request->all();

        // Hash password if it is provided
        if ($request->filled('user_password')) {
            $data['user_password'] = bcrypt($request->user_password);
        } else {
            unset($data['user_password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data user berhasil dihapus.');
    }
}
