@extends('layouts.admin')
@section('title', 'Kelola Jadwal')
@section('content')
<div class="card"><div class="card-header"><h2>Kelola Jadwal</h2></div><div class="card-body">
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah Jadwal</a>
    <table class="table table-striped table-bordered" id="tableJadwal">
        <thead><tr><th>No</th><th>Bus</th><th>Rute</th><th>Tanggal</th><th>Jam</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($jadwal as $i => $j)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $j->bus->no_plat ?? '-' }} ({{ $j->bus->tipeBus->nama_tipe ?? '' }})</td>
                    <td>{{ $j->rute->lokasi_asal ?? '' }} → {{ $j->rute->lokasi_tujuan ?? '' }}</td>
                    <td>{{ $j->tanggal_berangkat->format('Y-m-d') }}</td>
                    <td>{{ $j->waktu_berangkat }}</td>
                    <td>
                        <a href="{{ route('admin.jadwal.edit', $j) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal" onclick="setDeleteUrl('{{ route('admin.jadwal.destroy', $j) }}')">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div></div>
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Konfirmasi Penghapusan</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
    <div class="modal-body">Apakah Anda yakin ingin menghapus jadwal ini?</div>
    <div class="modal-footer"><form id="formHapus" method="POST">@csrf @method('DELETE')
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form></div>
</div></div></div>
@endsection
@push('scripts')<script>function setDeleteUrl(url) { document.getElementById('formHapus').action = url; }</script>@endpush
