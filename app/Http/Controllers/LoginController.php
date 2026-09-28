<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        // if (session()->has('login')) {
        //     return redirect()->route('admin.dashboard');
        // }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withInput($request->only('username'))->with('error', 'Username atau password salah.');
        }

        $request->session()->regenerate();

        session([
            'login' => true,
            'user_id' => $user->id_user,
            'user_name' => $user->name,
            'username' => $user->username,
            'user_role' => $user->role,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
