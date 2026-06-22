<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('Admin.Kelola_Buku.index', compact('buku'));
    }


    public function create()
    {
        return view('Admin.Kelola_Buku.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'judul'     => 'required',
                'genre'     => 'required',
                'pengarang' => 'required',
                'penerbit'  => 'required',
                'stok' => 'required|integer|min:0'
            ],
            [
                'judul.required'     => 'Judul Harus Diisi',
                'genre.required'     => 'Genre Harus Diisi',
                'pengarang.required'     => 'Pengarang Harus Diisi',
                'penerbit.required'     => 'Penerbit Harus Diisi',
            ]
        );

        
        $status = $request->stok > 0 ? 'tersedia' : 'dipinjam';

        Buku::create([
            'judul'     => $request->judul,
            'genre'     => $request->genre,
            'pengarang' => $request->pengarang,
            'penerbit'  => $request->penerbit,
            'stok'      => $request->stok,
            'status'    => $status,
        ]);

        return redirect()->route('databuku')
            ->with('success', 'Data buku berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()->route('databuku')
            ->with('success', 'Data buku berhasil dihapus');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('Admin.Kelola_Buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul'     => 'required',
                'genre'     => 'required',
                'pengarang' => 'required',
                'penerbit'  => 'required',
            ],
            [
                'judul.required'     => 'Judul Harus Diisi',
                'genre.required'     => 'Genre Harus Diisi',
                'pengarang.required'     => 'Pengarang Harus Diisi',
                'penerbit.required'     => 'Penerbit Harus Diisi',
            ]
        );

        $buku = Buku::findOrFail($id);

        $buku->update([
            'judul'     => $request->judul,
            'genre'     => $request->genre,
            'pengarang' => $request->pengarang,
            'penerbit'  => $request->penerbit,
            'stok'  => $request->stok,
        ]);

        return redirect()->route('databuku')
            ->with('success', 'Data buku berhasil diupdate');
    }
}
