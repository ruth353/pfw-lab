@extends('guest.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold text-primary">Welcome to BookStore</h1>
            <p class="lead text-muted">Halaman Guest dengan Partial View — Menampilkan data Publisher & Book</p>
        </div>
    </div>

    <div class="row">
        {{-- Partial: Daftar Publisher (Eloquent) --}}
        <div class="col-md-6 mb-4">
            @include('guest.partials.publisher-list', ['publishers' => $publishers])
        </div>

        {{-- Partial: Daftar Book (Query Builder) --}}
        <div class="col-md-6 mb-4">
            @include('guest.partials.book-list', ['books' => $books])
        </div>
    </div>
@endsection
