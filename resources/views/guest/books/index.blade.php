@extends('guest.layouts.app')

@section('title', 'Daftar Book')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📚 Daftar Book <span class="badge bg-success">Query Builder</span></h2>
        <a href="{{ route('guest.books.create') }}" class="btn btn-success">+ Tambah Book</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Publisher</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $i => $book)
                            <tr>
                                <td>{{ $books->firstItem() + $i }}</td>
                                <td>{{ $book->title }}</td>
                                <td><span class="badge bg-secondary">{{ $book->publisher_name }}</span></td>
                                <td>{{ Str::limit($book->description, 50) ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('guest.books.edit', $book->id) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('guest.books.destroy', $book->id) }}" method="POST"
                                          class="d-inline" onsubmit="return confirm('Yakin hapus book ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data book.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($books->hasPages())
            <div class="card-footer">
                {{ $books->links() }}
            </div>
        @endif
    </div>
@endsection
