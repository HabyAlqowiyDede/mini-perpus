<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('Admin.Kelola_Peminjaman.index');
    }
    public function create()
    {
        $users = User::all();
        $bukus = Buku::where('stok', '>', 0)->get();

        return view('Admin.Kelola_Peminjaman.create', compact('users', 'bukus'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id'          => 'required',
            'buku_id'          => 'required',
            'tanggal_pinjam'   => 'required',
            'tanggal_kembali'  => 'required',
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok buku habis');
        }

        Peminjaman::create([
            'user_id'          => $request->user_id,
            'buku_id'          => $request->buku_id,
            'tanggal_pinjam'   => $request->tanggal_pinjam,
            'tanggal_kembali'  => $request->tanggal_kembali,
            'status'           => 'dipinjam',
        ]);

        // Kurangi stok
        $buku->decrement('stok');

        return redirect()->route('peminjaman')
            ->with('success', 'Data peminjaman berhasil ditambahkan');
    }
}
