@extends('layouts/layout')

@section('content')
    <div>
        <div class="container">
            <h1>Edit Room in {{ $hotel->name_hotel }}</h1>
            <br>
            <form action="/room/edit/{{ $room->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name_room" class="form-label">Name Room</label>
                    <input type="text" class="form-control" id="name_room" name="name_room" required
                        value="{{ $room->name_room }}">
                    @error('name_room')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Credit Price</label>
                    <input type="text" class="form-control" id="price" name="price" required
                        value="{{ $room->price }}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_room" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image_room" name="image_room">
                    @error('image_room')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="id_hotel" value="{{ $hotel->id }}">
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            <form action="/room/delete/{{ $room->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete room?')"
                    type="submit">Delete</button>
                <input type="hidden" name="hotel_id" value="{{ $hotel }}">
            </form>
        </div>
    </div>
@endsection
