@extends('layouts.admin')
@section('title', 'Kelola Pengguna')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Kelola Pengguna</h2>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.pengguna.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Pengguna
        </a>

        <table class="table table-striped table-bordered" id="tablePengguna">
            <thead>
                <tr>
                    <th>No</th><th>Nama</th><th>Email</th><th>Telpon</th><th>Peran</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengguna as $i => $user)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->peran }}</td>
                        <td>
                            <a href="{{ route('admin.pengguna.edit', $user) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal"
                                onclick="setDeleteUrl('{{ route('admin.pengguna.destroy', $user) }}')">Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body">Apakah Anda yakin ingin menghapus pengguna ini?</div>
            <div class="modal-footer">
                <form id="formHapus" method="POST">@csrf @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function setDeleteUrl(url) { document.getElementById('formHapus').action = url; }
</script>
@endpush
