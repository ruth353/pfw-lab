@extends('guest.layouts.app')

@section('title', 'Tambah Book')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tambah Book Baru</h5>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('guest.books.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="publisher_id" class="form-label">Publisher <span class="text-danger">*</span></label>
                            <select name="publisher_id" id="publisher_id" class="form-select" required>
                                <option value="">-- Pilih Publisher --</option>
                                @foreach($publishers as $id => $name)
                                    <option value="{{ $id }}" {{ old('publisher_id') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Buku <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control"
                                      rows="3">{{ old('description') }}</textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">💾 Simpan</button>
                            <a href="{{ route('guest.books.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
