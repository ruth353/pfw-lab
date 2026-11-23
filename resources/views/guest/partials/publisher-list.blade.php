<div class="card h-100">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">📖 Publishers <span class="badge bg-light text-primary">Eloquent</span></h5>
        <a href="{{ route('guest.publishers.create') }}" class="btn btn-sm btn-light">+ Tambah</a>
    </div>
    <div class="card-body p-0">
        @if($publishers->isEmpty())
            <p class="text-muted text-center py-4">Belum ada data publisher.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jumlah Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publishers as $i => $publisher)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->address ?? '-' }}</td>
                                <td><span class="badge bg-info">{{ $publisher->books_count ?? 0 }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <div class="card-footer text-center">
        <a href="{{ route('guest.publishers.index') }}" class="btn btn-outline-primary btn-sm">Lihat Semua &raquo;</a>
    </div>
</div>
