@extends('layouts/layout')

@section('content')
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

    <div class="container mt-4">
        <h1>List of Users</h1>
        <b><a href="/user/create" class="btn btn-primary mb-4 mt-4">Add User</a></b>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Credit Balance</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1 @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->credit_balance }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href='user/edit/{{ $user->id }}' class="btn btn-primary">Edit</a>
                            <form action="user/delete/{{ $user->id }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        {{ $users->links() }}
    </div>
@endsection
