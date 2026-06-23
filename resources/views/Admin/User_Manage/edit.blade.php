@extends('layouts.app')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h4>Edit User</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('user.update', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama</label>

                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>

                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                            name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
