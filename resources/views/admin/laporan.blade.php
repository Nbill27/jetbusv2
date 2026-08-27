@extends('layouts.admin')
@section('title', 'Laporan')
@section('content')
<div class="card mb-4"><div class="card-header"><h2>Laporan Transaksi</h2></div><div class="card-body">
    <form method="GET" action="{{ route('admin.laporan') }}" class="row g-2 mb-3">
        <div class="col-md-3"><label class="form-label">Dari</label><input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Sampai</label><input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control"></div>
        <div class="col-md-3"><label class="form-label">Status</label><select name="status" class="form-select"><option value="all">Semua</option>@foreach(['tertunda','dibayar','gagal','dibatalkan'] as $s)<option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>@endforeach</select></div>
        <div class="col-md-3 d-flex align-items-end"><button type="submit" class="btn btn-primary w-100">Filter</button></div>
    </form>
    <div class="card text-white bg-success mb-3"><div class="card-body"><h5>Total Pendapatan (Dibayar)</h5><h3>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3></div></div>
    <table class="table table-striped table-bordered" id="tableTransaksi">
        <thead><tr><th>ID</th><th>Pelanggan</th><th>Tanggal</th><th>Total</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($transaksi as $t)
                <tr>
                    <td>{{ $t->id_transaksi }}</td>
                    <td>{{ $t->pengguna->name ?? '-' }}</td>
                    <td>{{ $t->tanggal_transaksi->format('Y-m-d') }}</td>
                    <td>Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                    <td><span class="badge bg-{{ $t->status === 'dibayar' ? 'success' : ($t->status === 'tertunda' ? 'warning' : 'danger') }}">{{ ucfirst($t->status) }}</span></td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div></div>
@endsection
