@extends('layouts/layout')

@section('content')
    <div>
        <div class="container">
            <h1>Edit Hotel {{ $hotel->name_hotel }}</h1>
            <br>
            <form action="/hotel/edit/{{ $hotel->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name_hotel" class="form-label">Name Hotel</label>
                    <input type="text" class="form-control" id="name_hotel" name="name_hotel"
                        value="{{ $hotel->name_hotel }}">
                    @error('name_hotel')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="{{ $hotel->alamat }}">
                    @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image_url" name="image_url">
                    @error('image_url')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="total_room" class="form-label">Total Room</label>
                    <input type="text" class="form-control" id="total_room" name="total_room" value="{{ $hotel->total_room }}">
                    @error('total_room')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            <form action="/hotel/delete/{{ $hotel->id }}" method="POST" style="mb-4 mt-4">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete hotel?')"
                    type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
