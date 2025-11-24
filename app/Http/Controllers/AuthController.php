<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('pengguna_id')) {
            return redirect()->route('pos.index');
        }
        
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $pengguna = Pengguna::where('username', $request->username)
            ->where('status', 'active')
            ->first();

        if (!$pengguna || !Hash::check($request->password, $pengguna->password_hash)) {
            return back()->withErrors([
                'username' => 'Username atau password salah.',
            ])->withInput();
        }

        // Load roles
        $roles = $pengguna->roles->pluck('kode_role')->toArray();

        // Set session
        session([
            'pengguna_id' => $pengguna->id_user,
            'pengguna_username' => $pengguna->username,
            'pengguna_email' => $pengguna->email,
            'pengguna_roles' => $roles,
        ]);

        return redirect()->intended(route('pos.index'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'pengguna_id',
            'pengguna_username',
            'pengguna_email',
            'pengguna_roles',
        ]);

        $request->session()->flush();

        return redirect()->route('login');
    }
}