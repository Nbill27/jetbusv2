@extends('layouts.app')
@section('title', 'Agen')

@push('styles')
<style>
    .page-header { background: url('{{ asset('assets/img/bgagen.jpg') }}') no-repeat center center/cover; position: relative; height: 280px; display: flex; align-items: center; justify-content: center; text-align: center; }
    .page-header::before { content: ''; position: absolute; inset: 0; background: rgba(26,39,68,0.65); }
    .page-header .container { position: relative; z-index: 1; }
    .page-header h1 { color: #fff; font-weight: 700; font-size: 2.25rem; margin-bottom: 0.5rem; }
    .page-header p { color: rgba(255,255,255,0.85); font-size: 1rem; margin: 0; }
    .agen-card { border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.5rem; transition: transform 0.15s, box-shadow 0.15s; background: #fff; }
    .agen-card:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
    .agen-card h5 { color: #1a2744; font-weight: 600; margin-bottom: 0.75rem; }
    .agen-card p { color: #64748b; font-size: 0.9rem; margin-bottom: 0.35rem; }
    .agen-card i { color: #f59e0b; margin-right: 0.5rem; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Agen Kami</h1>
        <p>Temukan agen terdekat untuk kemudahan pemesanan.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="agen-card h-100">
                    <h5>Agen Jakarta</h5>
                    <p><i class="bi bi-geo-alt-fill"></i>Jl. Merdeka No. 1, Jakarta Pusat</p>
                    <p><i class="bi bi-telephone-fill"></i>+62 811-123-456</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="agen-card h-100">
                    <h5>Agen Surabaya</h5>
                    <p><i class="bi bi-geo-alt-fill"></i>Jl. Raya Surabaya No. 99, Surabaya</p>
                    <p><i class="bi bi-telephone-fill"></i>+62 812-234-567</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="agen-card h-100">
                    <h5>Agen Bandung</h5>
                    <p><i class="bi bi-geo-alt-fill"></i>Jl. Soekarno-Hatta No. 88, Bandung</p>
                    <p><i class="bi bi-telephone-fill"></i>+62 813-345-678</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>AOS.init({ duration: 500, once: true });</script>
@endpush
