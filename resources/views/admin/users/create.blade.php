@extends('layouts.admin')

@section('header', 'Tambah User')

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @include('admin.users._form')
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
@endsection