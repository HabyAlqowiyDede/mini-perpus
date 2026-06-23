@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Data Buku</h4>
                @role('admin')
                <div>
                    <a href="{{route('peminjaman.create')}}" class="btn btn-primary">Tambah Data</a>
                </div>
                @endrole
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Peminjaman</th>
                            <th>Pengembalian</th>
                            <th>Total Pinjam</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index=>$item)

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td></td>
                        </tr>
                                                    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
