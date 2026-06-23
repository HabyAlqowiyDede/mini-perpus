@extends('layouts.app')

@section('title')
    Kelola User
@endsection

@section('content')
    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h4>Kelola User</h4>
            </div>

            <div class="card-body">

                <table class="table table-bordered " id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->name }}</td>

                                <td>{{ $item->email }}</td>

                                <td>

                                    <a href="{{ route('user.peminjaman', $item->id) }}" class="btn btn-info btn-sm">
                                        Detail
                                    </a>

                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('user.delete', $item->id) }}" method="POST"
                                        style="display:inline-block;">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus user?')">
                                            Hapus
                                        </button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
