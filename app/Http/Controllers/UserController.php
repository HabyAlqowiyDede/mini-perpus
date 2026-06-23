<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;

class UserController extends Controller
{
    // Halaman Kelola User (Admin)
    public function index()
    {
        $users = User::all();

        return view('Admin.User_Manage.index', compact('users'));
    }

    // Riwayat peminjaman user yang login
    public function riwayat()
    {
        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->get();

        return view('User.riwayat_peminjaman', compact('peminjaman'));
    }
    public function edit($id)
{
        $user = User::findOrFail($id);
        return view('Admin.User_Manage.edit', compact('user'));
}

    public function destroy($id)
{
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()
        ->with('success', 'User berhasil dihapus');
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    return redirect()->route('usermanage')
        ->with('success', 'User berhasil diupdate');
}

    // Detail peminjaman user tertentu (Admin)
    public function detailPeminjaman($id)
    {
        $user = User::findOrFail($id);

        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', $id)
            ->get();

        return view(
            'Admin.User_Manage.detail_peminjaman',
            compact('user', 'peminjaman')
        );
    }
}   