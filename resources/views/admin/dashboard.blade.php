@extends('layouts.admin')
@section('title', 'Dashboard')

@push('styles')
<style>
    .stat-card { border: none; border-radius: 8px; overflow: hidden; }
    .stat-card .card-body { padding: 1.25rem; }
    .stat-card .stat-icon { width: 48px; height: 48px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
    .stat-card .stat-label { font-size: 0.8rem; font-weight: 500; color: #64748b; margin-bottom: 0.25rem; }
    .stat-card .stat-value { font-size: 1.5rem; font-weight: 700; color: #1a2744; }
    .icon-bus { background: rgba(59,130,246,0.1); color: #3b82f6; }
    .icon-route { background: rgba(16,185,129,0.1); color: #10b981; }
    .icon-user { background: rgba(139,92,246,0.1); color: #8b5cf6; }
    .icon-revenue { background: rgba(245,158,11,0.1); color: #f59e0b; }
</style>
@endpush

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon icon-bus"><i class="bi bi-bus-front"></i></div>
                <div><div class="stat-label">Total Bus</div><div class="stat-value">{{ $totalBus }}</div></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon icon-route"><i class="bi bi-map"></i></div>
                <div><div class="stat-label">Total Rute</div><div class="stat-value">{{ $totalRute }}</div></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon icon-user"><i class="bi bi-people"></i></div>
                <div><div class="stat-label">Pelanggan</div><div class="stat-value">{{ $totalPelanggan }}</div></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon icon-revenue"><i class="bi bi-cash-coin"></i></div>
                <div><div class="stat-label">Pendapatan Hari Ini</div><div class="stat-value">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white border-bottom py-3">
        <h5 class="mb-0 fw-bold" style="color: #1a2744;"><i class="bi bi-clock-history me-2"></i>Pemesanan Terbaru</h5>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>ID</th><th>Pelanggan</th><th>Tanggal</th><th>Waktu</th><th>Total</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksiTerbaru as $t)
                    <tr>
                        <td class="fw-medium">{{ $t->id_transaksi }}</td>
                        <td>{{ $t->pengguna->name ?? '-' }}</td>
                        <td>{{ $t->jadwal->tanggal_berangkat->format('d M Y') }}</td>
                        <td>{{ $t->jadwal->waktu_berangkat }}</td>
                        <td class="fw-medium">Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $t->status == 'dibayar' ? 'success' : ($t->status == 'pending' ? 'warning' : 'secondary') }}-subtle text-{{ $t->status == 'dibayar' ? 'success' : ($t->status == 'pending' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($t->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">Belum ada transaksi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
