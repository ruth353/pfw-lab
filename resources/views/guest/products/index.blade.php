@extends('guest.layouts.app')

@section('title', 'Daftar Product')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📦 Daftar Product <span class="badge bg-success">Query Builder</span></h2>
        <a href="{{ route('guest.products.create') }}" class="btn btn-success">+ Tambah Product</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $i => $product)
                            <tr>
                                <td>{{ $products->firstItem() + $i }}</td>
                                <td>{{ $product->name }}</td>
                                <td><span class="badge bg-secondary">{{ $product->category_name }}</span></td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('guest.products.edit', $product->id) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('guest.products.destroy', $product->id) }}" method="POST"
                                          class="d-inline" onsubmit="return confirm('Yakin hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($products->hasPages())
            <div class="card-footer">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
