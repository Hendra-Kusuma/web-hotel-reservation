@extends('layouts/layout')


@section('content')
    <div class="container mt-5">
        <h1 class="mb4">Hotels</h1>
        <br>

        @role('admin')
            <a href="/hotel/create" class="btn btn-primary mb-4 mt-4">Add Hotel</a>
        @endrole
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
        <div class="row">
            @foreach ($hotels as $hotel)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $hotel->image_url) }}" class="card-img-top" alt="Hotel Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->name_hotel }}</h5>
                            <p class="card-text">{{ $hotel->alamat }}</p>
                            <p class="card-text">Total Room: {{ $hotel->total_room }}</p>
                            <a href="/room/{{ $hotel->id }}" class="btn btn-primary">View Details</a>
                            @role('admin')
                                <a href="/hotel/edit/{{ $hotel->id }}" class="btn btn-success mb-4 mt-4">Edit Hotel</a>
                            @endrole
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Pagination --}}
        {{ $hotels->links() }}
    </div>
@endsection
