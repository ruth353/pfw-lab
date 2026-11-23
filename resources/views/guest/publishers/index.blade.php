@extends('guest.layouts.app')

@section('title', 'Daftar Publisher')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📖 Daftar Publisher <span class="badge bg-primary">Eloquent</span></h2>
        <a href="{{ route('guest.publishers.create') }}" class="btn btn-primary">+ Tambah Publisher</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Publisher</th>
                            <th>Alamat</th>
                            <th>Jumlah Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($publishers as $i => $publisher)
                            <tr>
                                <td>{{ $publishers->firstItem() + $i }}</td>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->address ?? '-' }}</td>
                                <td><span class="badge bg-info">{{ $publisher->books_count }}</span></td>
                                <td>
                                    <a href="{{ route('guest.publishers.edit', $publisher) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('guest.publishers.destroy', $publisher) }}" method="POST"
                                          class="d-inline" onsubmit="return confirm('Yakin hapus publisher ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data publisher.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($publishers->hasPages())
            <div class="card-footer">
                {{ $publishers->links() }}
            </div>
        @endif
    </div>
@endsection
