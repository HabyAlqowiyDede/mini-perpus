@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Riwayat Peminjaman</h4>

            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>tanggal peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Total Pinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->buku->judul }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    @if ($item->status == 'dipinjam')
                                        <span class="badge badge-warning">
                                            Dipinjam
                                        </span>
                                    @else
                                        <span class="badge badge-success">
                                            Dikembalikan
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
