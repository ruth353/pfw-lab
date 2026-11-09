@extends('layouts.admin')

@section('header', 'Edit User')

@section('content')
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf @method('PUT')
        @include('admin.users._form', ['user' => $user])
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
@endsection