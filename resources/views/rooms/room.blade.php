@extends('layouts/layout')


@section('content')
    <div class="container mt-5">
        <h1>{{ $hotel->name_hotel }} Rooms</h1>
        <br>
        @role('admin')
            <a href="/room/create/{{ $hotel->id }}" class="btn btn-primary mb-4 mt-4">Add Room</a>
        @endrole
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @foreach ($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $room->image_room) }}" class="card-img-top" alt="Room Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name_room }}</h5>
                            <p class="card-text">{{ $room->alamat }}</p>
                            <p class="card-text">Credit Price: {{ $room->price }}</p>
                            @role('user')
                                <a href="/reservation/{{ $room->id }}" class="btn btn-primary"
                                    onclick="return confirm('Are you sure want to book this room?')">Book Room</a>
                            @endrole
                            @role('admin')
                                <a href="/room/edit/{{ $room->id }}" class="btn btn-success mb-4 mt-4">Edit Room</a>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
