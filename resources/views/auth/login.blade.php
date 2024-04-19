@extends('layouts/layout')

@section('content')
    <div class="container">
        <div class="row login-container">
            <div class="col-md-6 offset-md-3">
                <div class="card card-login">
                    <div class="card-body">
                        <h3 class="text-center">Login</h3>
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
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
                            <br>
                            <p>dont have a account? contact your admin 😊</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
