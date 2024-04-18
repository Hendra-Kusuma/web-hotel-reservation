@extends('layouts/layout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div>ini halaman home</div>
@endsection
