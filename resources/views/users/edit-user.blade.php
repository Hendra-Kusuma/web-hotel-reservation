@extends('layouts/layout')


@section('content')
    <div>
        <div class="container">
            <br>
            <h1>Create User</h1>
            <br>
            <form action="/user/edit/{{ $users->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="role" class="form-label">Image</label>
                    <input type="text" class="form-control" id="role" name="role" value="{{ $users->role }}">
                </div>
                @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
