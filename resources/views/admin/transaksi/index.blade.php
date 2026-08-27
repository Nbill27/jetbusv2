@extends('layouts.admin')
@section('title', 'Kelola Transaksi')
@section('content')
<div class="card"><div class="card-header"><h2>Kelola Transaksi</h2></div><div class="card-body">
    <table class="table table-striped table-bordered" id="tableTransaksi">
        <thead><tr><th>ID</th><th>Pelanggan</th><th>Rute</th><th>Tanggal</th><th>Total</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($transaksi as $t)
                <tr>
                    <td>{{ $t->id_transaksi }}</td>
                    <td>{{ $t->pengguna->name ?? '-' }}</td>
                    <td>{{ $t->jadwal->rute->lokasi_asal ?? '' }} → {{ $t->jadwal->rute->lokasi_tujuan ?? '' }}</td>
                    <td>{{ $t->tanggal_transaksi->format('Y-m-d') }}</td>
                    <td>Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                    <td><span class="badge bg-{{ $t->status === 'dibayar' ? 'success' : ($t->status === 'tertunda' ? 'warning' : 'danger') }}">{{ ucfirst($t->status) }}</span></td>
                    <td><a href="{{ route('admin.transaksi.show', $t) }}" class="btn btn-primary btn-sm">Detail</a></td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Belum ada transaksi.</td></tr>
            @endforelse
        </tbody>
    </table>
</div></div>
@endsection
