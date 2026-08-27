@extends('layouts.admin')
@section('title', 'Detail Transaksi')
@section('content')
<div class="card mb-4">
    <div class="card-header"><h2>Detail Transaksi #{{ $transaksi->id_transaksi }}</h2></div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr><td><strong>Pelanggan</strong></td><td>{{ $transaksi->pengguna->name ?? '-' }}</td></tr>
            <tr><td><strong>Email</strong></td><td>{{ $transaksi->pengguna->email ?? '-' }}</td></tr>
            <tr><td><strong>Rute</strong></td><td>{{ $transaksi->jadwal->rute->lokasi_asal }} → {{ $transaksi->jadwal->rute->lokasi_tujuan }}</td></tr>
            <tr><td><strong>Bus</strong></td><td>{{ $transaksi->jadwal->bus->no_plat }} ({{ $transaksi->jadwal->bus->tipeBus->nama_tipe }})</td></tr>
            <tr><td><strong>Tanggal Berangkat</strong></td><td>{{ $transaksi->jadwal->tanggal_berangkat->format('Y-m-d') }}</td></tr>
            <tr><td><strong>Waktu Berangkat</strong></td><td>{{ $transaksi->jadwal->waktu_berangkat }}</td></tr>
            <tr><td><strong>Bangku</strong></td><td>@foreach($transaksi->detailTransaksi as $d)<span class="badge bg-primary me-1">{{ $d->bangku->no_bangku }}</span>@endforeach</td></tr>
            <tr><td><strong>Total</strong></td><td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td></tr>
            <tr><td><strong>Status</strong></td><td><span class="badge bg-{{ $transaksi->status === 'dibayar' ? 'success' : ($transaksi->status === 'tertunda' ? 'warning' : 'danger') }}">{{ ucfirst($transaksi->status) }}</span></td></tr>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-header"><h5>Ubah Status</h5></div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.transaksi.update', $transaksi) }}" class="d-flex gap-2">@csrf @method('PUT')
            <select name="status" class="form-select w-auto">
                @foreach(['tertunda','dibayar','gagal','dibatalkan'] as $s)
                    <option value="{{ $s }}" {{ $transaksi->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
