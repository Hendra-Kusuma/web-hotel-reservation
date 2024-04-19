@extends('layouts/layout')


@section('content')
    <div>
        <div class="container">
            <h1>Add Hotels List</h1>
            <br>
            <form action="/hotel/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name_hotel" class="form-label">Name Hotel</label>
                    <input type="text" class="form-control" id="name_hotel" name="name_hotel" required>
                </div>
                @error('name_hotel')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="alamat" class="form-label">Address</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image_url" name="image_url" required>
                </div>
                @error('image_url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="total_room" class="form-label">Total room</label>
                    <input type="number" class="form-control" id="total_room" name="total_room" required>
                </div>
                @error('total_room')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
