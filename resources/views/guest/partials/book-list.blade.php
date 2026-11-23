<div class="card h-100">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">📚 Books <span class="badge bg-light text-success">Query Builder</span></h5>
        <a href="{{ route('guest.books.create') }}" class="btn btn-sm btn-light">+ Tambah</a>
    </div>
    <div class="card-body p-0">
        @if($books->isEmpty())
            <p class="text-muted text-center py-4">Belum ada data book.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Publisher</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $i => $book)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $book->title }}</td>
                                <td><span class="badge bg-secondary">{{ $book->publisher_name }}</span></td>
                                <td>{{ Str::limit($book->description, 40) ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <div class="card-footer text-center">
        <a href="{{ route('guest.books.index') }}" class="btn btn-outline-success btn-sm">Lihat Semua &raquo;</a>
    </div>
</div>
