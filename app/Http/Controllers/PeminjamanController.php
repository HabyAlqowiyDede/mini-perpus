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
        $data = Peminjaman::whereHas('user', function ($query) {
            $query->whereHas('roles', function ($q) {
                $q->where('name', 'user');
            });
        })->get();

        return view('Admin.Kelola_Peminjaman.index', compact('data'));
    }
    public function edit($id)
    {
        $data = Peminjaman::findOrFail($id);
        $users = User::all();
        $bukus = Buku::where('stok', '>', 0)->get();

        return view('Admin.Kelola_Peminjaman.edit', compact('data', 'users', 'bukus'));
    }
    public function create()
    {
        $users = User::role('user')->get();
        $bukus = Buku::where('stok', '>', 0)->get();

        return view('Admin.Kelola_Peminjaman.create', compact('users', 'bukus'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id'          => 'required',
                'buku_id'          => 'required',
                'tanggal_pinjam'   => 'required',
                'tanggal_kembali'  => 'required',
                'jumlah' => 'required|integer|min:1|max:3',
            ],
            [
                'user_id.required' => 'User harus diisi',
                'buku_id.required' => 'Judul harus diisi',
                'tanggal_pinjam.required' => 'Tanggal pinjaman harus diisi',
                'tanggal_kembali.required' => 'Tanggal Kembalian harus diisi',
                'jumlah.required' => 'Jumlah buku wajib diisi',
                'jumlah.integer' => 'Jumlah harus berupa angka',
                'jumlah.min' => 'Minimal peminjaman 1 buku',
                'jumlah.max' => 'Maksimal peminjaman 3 buku',
            ]
        );

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok < $request->jumlah) {
            return back()->with('error', 'Stok buku tidak mencukupi');
        }

        Peminjaman::create([
            'user_id'          => $request->user_id,
            'buku_id'          => $request->buku_id,
            'tanggal_pinjam'   => $request->tanggal_pinjam,
            'tanggal_kembali'  => $request->tanggal_kembali,
            'jumlah'           => $request->jumlah,
            'status'           => 'Dipinjam',
        ]);

        // Kurangi stok
        $buku->decrement('stok', $request->jumlah);
        $buku->status = $buku->stok > 0 ? 'tersedia' : 'stok habis';
        $buku->save();

        return redirect()->route('peminjaman')
            ->with('success', 'Data peminjaman berhasil ditambahkan');
    }
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $buku = Buku::find($peminjaman->buku_id);

        if ($buku) {
            $buku->increment('stok', $peminjaman->jumlah);
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman')
            ->with('success', 'Data peminjaman berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'user_id' => 'required',
                'buku_id' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'jumlah' => 'required|integer|min:1|max:3'
            ],
            [
                'jumlah.required' => 'Jumlah buku wajib diisi',
                'jumlah.integer' => 'Jumlah harus berupa angka',
                'jumlah.min' => 'Minimal peminjaman 1 buku',
                'jumlah.max' => 'Maksimal peminjaman 3 buku',
            ]
        );

        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('peminjaman')
            ->with('success', 'Data peminjaman berhasil diupdate');
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // ubah status peminjaman
        $peminjaman->status = 'tersedia';
        $peminjaman->save();


        // tambah stok buku
        $buku = Buku::findOrFail($peminjaman->buku_id);

        $buku->increment('stok', $peminjaman->jumlah);


        // update status buku
        $buku->status = $buku->stok > 0
            ? 'tersedia'
            : 'stok habis';

        $buku->save();


        return back()->with('success', 'Buku berhasil dikembalikan');
    }
}
