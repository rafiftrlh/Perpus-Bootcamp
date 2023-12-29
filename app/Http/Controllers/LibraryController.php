<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class LibraryController extends Controller
{
    public function index_admin()
    {
        $bukus = Buku::all();
        return view('index_admin', compact("bukus"));
    }

    public function admin_pinjam()
    {
        $bukus = Buku::all();
        return view('admin_pinjam', compact("bukus"));
    }

    public function data_siswa()
    {
        $siswas = Siswa::all();
        return view('data_siswa', compact("siswas"));
    }

    public function delete_siswa($id)
    {
        $siswas = Siswa::findOrFail($id);
        $siswas->delete();
        return redirect()->route('data_siswa')->with('success', 'Akun berhasil dihapus');
    }

    public function edit_siswa(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'email' => 'required|email',
            'role_status' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validatedData);
        return redirect()->route('data_siswa')->with('success', 'Buku berhasil diedit');
    }

    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('register');
    }

    public function profile_siswa()
    {
        return view('profile_siswa');
    }

    public function profile_admin()
    {
        return view('profile_admin');
    }

    public function delete_buku($id)
    {
        $bukus = Buku::findOrFail($id);
        $bukus->delete();
        return redirect()->route('dashboard_admin')->with('success', 'Data berhasil dihapus');
    }

    public function create_buku(Request $request)
    {
        $datas = $request->validate([
            'judul' => 'required|string',
            'penerbit' => 'required|string',
            'pengarang' => 'required|string',
            'stok_buku' => 'required|integer'
        ]);

        Buku::create($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit_buku(Request $request, $id)
    {
        $datas = $request->validate([
            'judul' => 'required|string',
            'penerbit' => 'required|string',
            'pengarang' => 'required|string',
            'stok_buku' => 'required|integer'
        ]);

        $bukus = Buku::findOrFail($id);
        $bukus->update($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Buku berhasil diedit');
    }


}
