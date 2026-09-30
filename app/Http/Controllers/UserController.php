<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function profile()
    {
        $user = User::findOrFail(session('user_id'));

        return view('admin.user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
{
    $user = User::findOrFail(session('user_id'));

    $request->validate([
        'name' => 'required|string|max:100',
        'username' => 'required|string|max:30|unique:user,username,' . $user->id_user . ',id_user',
        'password' => 'nullable|min:6',
    ]);

    $data = [
        'name' => $request->name,
        'username' => $request->username,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    session([
        'user_name' => $user->name,
        'username' => $user->username,
    ]);

    return redirect()
        ->route('admin.user.profile')
        ->with('success', 'Profil pengguna berhasil diperbarui.');
}

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|max:30|unique:user,username',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,Operator',
        ]);

        User::create([
            'id_user' => (string) Str::uuid(),
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required|max:30|unique:user,username,' . $id . ',id_user',
            'password' => 'nullable|min:6',
            'role' => 'required|in:Admin,Operator',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.user')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User berhasil dihapus.');
    }
}
