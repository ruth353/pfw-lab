@extends('guest.layouts.app')

@section('title', 'Daftar Category')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>🏷️ Daftar Category <span class="badge bg-primary">Eloquent</span></h2>
        <a href="{{ route('guest.categories.create') }}" class="btn btn-primary">+ Tambah Category</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Category</th>
                            <th>Jumlah Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $i => $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $i }}</td>
                                <td>{{ $category->name }}</td>
                                <td><span class="badge bg-info">{{ $category->products->count() }}</span></td>
                                <td>
                                    <a href="{{ route('guest.categories.edit', $category) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('guest.categories.destroy', $category) }}" method="POST"
                                          class="d-inline" onsubmit="return confirm('Yakin hapus category ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Belum ada data category.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($categories->hasPages())
            <div class="card-footer">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
@endsection
