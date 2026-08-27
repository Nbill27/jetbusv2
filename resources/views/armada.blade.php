@extends('layouts.app')
@section('title', 'Armada')

@push('styles')
<style>
    .page-header { background: url('{{ asset('assets/img/dalambus.jpg') }}') no-repeat center center/cover; position: relative; height: 280px; display: flex; align-items: center; justify-content: center; text-align: center; }
    .page-header::before { content: ''; position: absolute; inset: 0; background: rgba(26,39,68,0.65); }
    .page-header .container { position: relative; z-index: 1; }
    .page-header h1 { color: #fff; font-weight: 700; font-size: 2.25rem; margin-bottom: 0.5rem; }
    .page-header p { color: rgba(255,255,255,0.85); font-size: 1rem; margin: 0; }
    .armada-card { border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; transition: transform 0.15s, box-shadow 0.15s; }
    .armada-card:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
    .armada-card img { height: 200px; object-fit: cover; }
    .armada-card .card-body { padding: 1.25rem; }
    .armada-card .card-title { color: #1a2744; font-weight: 600; }
    .armada-card .card-text { color: #64748b; font-size: 0.9rem; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Armada Kami</h1>
        <p>Kenali armada kami yang modern dan nyaman.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($tipeBus as $t)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="card armada-card h-100">
                        @if($t->foto)
                            <img src="{{ asset('assets/upload/' . $t->foto) }}" class="card-img-top" alt="{{ $t->nama_tipe }}">
                        @else
                            <img src="{{ asset('assets/img/armada-1.jpg') }}" class="card-img-top" alt="{{ $t->nama_tipe }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $t->nama_tipe }}</h5>
                            <p class="card-text mb-0">{{ $t->deskripsi ?? 'Armada berkualitas untuk perjalanan nyaman Anda.' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-bus-front fs-1 text-muted mb-3 d-block"></i>
                    <h5 class="fw-bold" style="color: #1a2744;">Belum ada data armada</h5>
                    <p class="text-muted">Data armada akan ditampilkan setelah ditambahkan oleh admin.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>AOS.init({ duration: 500, once: true });</script>
@endpush
