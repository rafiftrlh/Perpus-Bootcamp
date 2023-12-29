<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksis;
use Illuminate\Support\Facades\Auth;

class TransaksisController extends Controller
{
    public function index_siswa()
    {
        $bukus = Buku::all();
        return view('index_siswa', compact("bukus"));
    }

    public function pinjam_buku($id)
    {
        $buku = Buku::findOrFail($id);
        $bukuId = $buku->id;
        $bukuName = $buku->judul;

        $authId = Auth::user()->id;
        $authName = Auth::user()->name;

        $user = Transaksis::create([
            'siswa_id' => $authId,
            'name_siswa' => $authName,
            'buku_id' => $bukuId,
            'name_buku' => $bukuName,
            'qty' => 1,
        ]);

        return redirect()->route('dashboard_siswa');
    }

    public function data_buku()
    {
        $trxs = Transaksis::all();
        return view('data_pinjam', compact('trxs'));
    }

    public function delete_data_pinjam($id)
    {
        $trxs = Transaksis::findOrFail($id);
        $trxs->delete();
        return redirect()->route('data_pinjam')->with('success', 'Data berhasil dihapus');
    }
}
