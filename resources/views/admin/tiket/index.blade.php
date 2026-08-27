@extends('layouts.admin')
@section('title', 'Kelola Tiket')
@section('content')
<div class="card"><div class="card-header"><h2>Harga Tiket</h2></div><div class="card-body">
    <a href="{{ route('admin.tiket.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah Tiket</a>
    <table class="table table-striped table-bordered" id="tableTiket">
        <thead><tr><th>No</th><th>Rute</th><th>Tipe Bus</th><th>Harga</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($tiket as $i => $t)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $t->rute->lokasi_asal ?? '' }} → {{ $t->rute->lokasi_tujuan ?? '' }}</td>
                    <td>{{ $t->tipeBus->nama_tipe ?? '-' }}</td>
                    <td>Rp{{ number_format($t->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.tiket.edit', $t) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal" onclick="setDeleteUrl('{{ route('admin.tiket.destroy', $t) }}')">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div></div>
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Konfirmasi Penghapusan</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
    <div class="modal-body">Apakah Anda yakin ingin menghapus tiket ini?</div>
    <div class="modal-footer"><form id="formHapus" method="POST">@csrf @method('DELETE')
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form></div>
</div></div></div>
@endsection
@push('scripts')<script>function setDeleteUrl(url) { document.getElementById('formHapus').action = url; }</script>@endpush
