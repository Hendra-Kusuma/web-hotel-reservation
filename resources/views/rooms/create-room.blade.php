@extends('layouts/layout')


@section('content')
    <div>
        <div class="container">
            <h1>Add Room in {{ $hotel->name_hotel }}</h1>
            <br>
            <form action="/room/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name_room" class="form-label">Name Room</label>
                    <input type="text" class="form-control" id="name_room" name="name_room" required>
                </div>
                @error('name_room')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="price" class="form-label">Credit Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                </div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="image_room" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image_room" name="image_room" required>
                </div>
                @error('image_room')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="id_hotel" value={{$hotel->id}}>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
