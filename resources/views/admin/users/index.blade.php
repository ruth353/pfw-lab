@extends('layouts.admin')

@section('header', 'Daftar User')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah User</a>

    @if ($users->count())
        <table class="table">
            <thead>
                <tr>
                    <th>#</th><th>Nama</th><th>Email</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus user ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    @else
        <p>Belum ada user.</p>
    @endif
@endsection