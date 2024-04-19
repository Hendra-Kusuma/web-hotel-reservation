@extends('layouts/layout')


@section('content')
    <div>
        <div class="container">
            <br>
            <h1>Create User</h1>
            <br>
            <form action="/user/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="credit_balance" class="form-label">Credit</label>
                    <input type="number" class="form-control" id="credit_balance" name="credit_balance" required>
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="role" value='user'>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
