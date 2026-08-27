@extends('layouts.app')
@section('title', 'Cari Tiket | JetBus')

@push('styles')
<style>
    :root { --navy: #1a2744; --amber: #f59e0b; --slate: #f1f5f9; --white: #ffffff; --radius: 8px; }
    .filter-bar { background: var(--white); padding: 1.25rem; border-radius: var(--radius); box-shadow: 0 1px 3px rgba(0,0,0,0.06); margin-bottom: 2rem; }
    .filter-bar h4 { color: var(--navy); font-weight: 600; margin-bottom: 1rem; }
    .filter-item { margin-bottom: 1rem; }
    .filter-item .form-label { color: var(--text-muted); font-weight: 500; font-size: 0.8rem; margin-bottom: 0.25rem; }
    .filter-item .form-control, .filter-item .form-select { font-size: 0.85rem; border-radius: var(--radius); }
    .bus-card { border: 1px solid #e2e8f0; border-radius: var(--radius); overflow: hidden; transition: transform 0.15s, box-shadow 0.15s; background: var(--white); }
    .bus-card:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
    .bus-card img { height: 160px; object-fit: cover; }
    .bus-info { padding: 1rem; }
    .bus-info .badge { font-size: 0.75rem; padding: 0.35rem 0.6rem; font-weight: 600; }
    .bus-info h5 { color: var(--navy); font-weight: 600; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem; }
    .bus-info p { color: var(--text-muted); font-size: 0.85rem; margin-bottom: 0.25rem; }
    .bus-footer { padding: 0.75rem 1rem; background: var(--slate); border-top: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; }
    .bus-price { color: var(--navy); font-weight: 700; font-size: 1.25rem; }
    .btn-book { background: var(--amber); color: var(--navy); border: none; font-weight: 600; font-size: 0.8rem; padding: 0.5rem 1rem; border-radius: var(--radius); min-width: 110px; transition: background 0.15s; }
    .btn-book:hover { background: #d97706; color: var(--navy); }
    .empty-state { text-align: center; padding: 4rem 1rem; }
    .empty-state i { font-size: 3rem; color: var(--text-muted); margin-bottom: 1rem; }
    .empty-state h5 { color: var(--navy); font-weight: 600; margin-bottom: 0.5rem; }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="text-center mb-5"><h2 class="fw-bold mb-2" style="color: var(--navy);">Tiket Bus {{ $asal }} — {{ $tujuan }}</h2><p class="text-muted">Tanggal: {{ $tanggal }} | Kelas: {{ $kelas }}</p></div>

    <div class="filter-bar">
        <h4 class="h6 fw-bold">Filter</h4>
        <div class="row g-3">
            <div class="col-md-4 col-lg-3">
                <div class="filter-item"><label class="form-label">Kelas Bus</label><select class="form-select"><option>Semua Kelas</option></select></div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="filter-item"><label class="form-label">Jam Keberangkatan</label><select class="form-select"><option>Semua Waktu</option></select></div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="filter-item"><label class="form-label">Harga</label><select class="form-select"><option>Termurah — Termahal</option></select></div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="filter-item mt-4"><button class="btn btn-outline-secondary w-100" style="border-radius: var(--radius);">Terapkan</button></div>
            </div>
        </div>
    </div>

    @if($buses->isEmpty())
        <div class="empty-state">
            <i class="bi bi-bus-front"></i>
            <h5>Tidak ada bus tersedia</h5>
            <p class="text-muted">Coba ubah kota asal, tujuan, atau tanggal perjalanan Anda.</p>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3" style="background: var(--amber); color: var(--navy); border-radius: var(--radius);">Cari Tiket Lain</a>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($buses as $bus)
                <div class="col">
                    <div class="bus-card">
                        <img src="{{ asset('assets/upload/' . $bus->foto) }}" alt="{{ $bus->kelas }}" class="w-100">
                        <div class="bus-info">
                            <h5>{{ $bus->kelas }}<span class="badge bg-success-subtle text-success">{{ $bus->kursi_tersedia }} kursi tersedia</span></h5>
                            <div class="d-flex justify-content-between mb-2"><p class="mb-0"><i class="bi bi-clock"></i> {{ $bus->jam_berangkat }}</p><p class="mb-0"><i class="bi bi-geo-alt"></i> {{ $bus->asal }} → {{ $bus->tujuan }}</p></div>
                        </div>
                        <div class="bus-footer">
                            <div><span class="bus-price">Rp{{ number_format($bus->harga, 0, ',', '.') }}</span></div>
                            <a href="{{ route('login') }}" class="btn btn-book">Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.filter-item select').forEach(select => {
        select.addEventListener('change', () => { /* filter logic placeholder */ });
    });
</script>
@endpush
