<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->login_as === 'Login As') {
            return redirect()->route('login');
        }

        if ($request->login_as === 'admin') {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('dashboard_admin');

            }

            return redirect()->route('login');

        } else if ($request->login_as === 'siswa') {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);

            if (Auth::guard('siswa')->attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('dashboard_siswa');
            } else {
                return redirect()->route('login');
            }
        }
    }

    public function register(Request $request)
    {
        $user = Siswa::create([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'role_status' => 'siswa',
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }
}