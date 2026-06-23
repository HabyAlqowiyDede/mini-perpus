@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Data Buku</h4>
                @role('admin')
                    <div>
                        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                @endrole
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Peminjaman</th>
                            <th>Pengembalian</th>
                            <th>Total Pinjam</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->buku->judul }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->status }}</td>
                                @role('admin')
                                    <td>
                                        <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>


                                        @if ($item->status == 'dipinjam')
                                            <form action="{{ route('peminjaman.kembalikan', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf

                                                <button type="submit" class="btn btn-success btn-sm" 
                                                onclick="return confirm('Buku sudah ini dikembalikan?')">
                                                    Kembalikan
                                                </button>
                                            </form>
                                        @endif

                                    </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
