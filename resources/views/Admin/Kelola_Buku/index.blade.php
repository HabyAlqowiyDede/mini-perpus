@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Data Buku</h4>
                @role('admin')
                    <div>
                        <a href="{{ route('create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                @endrole
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Genre</th>
                            <th>Stok</th>
                            <th>Status</th>
                            @role('admin')
                                <th>Action</th>
                            @endrole
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($buku as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->pengarang }}</td>
                                <td>{{ $item->penerbit }}</td>
                                <td>{{ $item->genre }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>
                                    @if ($item->stok > 0)
                                        <span class="badge bg-success">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Tersedia</span>
                                    @endif
                                </td>
                                @role('admin')
                                    <td>
                                        <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
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
