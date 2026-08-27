@extends('layouts.admin')
@section('title', 'Kelola Bangku')
@section('content')
<div class="card"><div class="card-header"><h2>Kelola Bangku</h2></div><div class="card-body">
    <form method="GET" action="{{ route('admin.bangku.index') }}" class="mb-3">
        <div class="row g-2">
            <div class="col-md-4">
                <select name="id_bus" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Pilih Bus --</option>
                    @foreach($buses as $b)
                        <option value="{{ $b->id_bus }}" {{ $selectedBus == $b->id_bus ? 'selected' : '' }}>
                            {{ $b->no_plat }} ({{ $b->tipeBus->nama_tipe ?? '' }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    @if($selectedBus)
        <form method="POST" action="{{ route('admin.bangku.store') }}" class="mb-3 d-flex gap-2">@csrf
            <input type="hidden" name="id_bus" value="{{ $selectedBus }}">
            <input type="text" name="no_bangku" required class="form-control w-auto" placeholder="No Bangku">
            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah</button>
        </form>

        <table class="table table-striped table-bordered" id="tableBangku">
            <thead><tr><th>No</th><th>No Bangku</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($bangku as $i => $b)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $b->no_bangku }}</td>
                        <td><span class="badge bg-{{ $b->status === 'tersedia' ? 'success' : 'danger' }}">{{ ucfirst($b->status) }}</span></td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal" onclick="setDeleteUrl('{{ route('admin.bangku.destroy', $b) }}')">Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Belum ada bangku untuk bus ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    @endif
</div></div>
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Konfirmasi Penghapusan</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
    <div class="modal-body">Apakah Anda yakin ingin menghapus bangku ini?</div>
    <div class="modal-footer"><form id="formHapus" method="POST">@csrf @method('DELETE')
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form></div>
</div></div></div>
@endsection
@push('scripts')<script>function setDeleteUrl(url) { document.getElementById('formHapus').action = url; }</script>@endpush
