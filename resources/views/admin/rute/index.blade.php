@extends('layouts.admin')
@section('title', 'Kelola Rute')
@section('content')
<div class="card"><div class="card-header"><h2>Kelola Rute</h2></div><div class="card-body">
    <a href="{{ route('admin.rute.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah Rute</a>
    <table class="table table-striped table-bordered" id="tableRute">
        <thead><tr><th>No</th><th>Asal</th><th>Tujuan</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($rute as $i => $r)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $r->lokasi_asal }}</td>
                    <td>{{ $r->lokasi_tujuan }}</td>
                    <td>
                        <a href="{{ route('admin.rute.edit', $r) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal" onclick="setDeleteUrl('{{ route('admin.rute.destroy', $r) }}')">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div></div>
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Konfirmasi Penghapusan</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
    <div class="modal-body">Apakah Anda yakin ingin menghapus rute ini?</div>
    <div class="modal-footer"><form id="formHapus" method="POST">@csrf @method('DELETE')
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form></div>
</div></div></div>
@endsection
@push('scripts')<script>function setDeleteUrl(url) { document.getElementById('formHapus').action = url; }</script>@endpush
