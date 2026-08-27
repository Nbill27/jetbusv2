@extends('layouts.app')
@section('title', 'Tentang Kami')

@push('styles')
<style>
    .page-header { background: url('{{ asset('assets/img/bgabout.jpg') }}') no-repeat center center/cover; position: relative; height: 280px; display: flex; align-items: center; justify-content: center; text-align: center; }
    .page-header::before { content: ''; position: absolute; inset: 0; background: rgba(26,39,68,0.65); }
    .page-header .container { position: relative; z-index: 1; }
    .page-header h1 { color: #fff; font-weight: 700; font-size: 2.25rem; margin-bottom: 0.5rem; }
    .page-header p { color: rgba(255,255,255,0.85); font-size: 1rem; margin: 0; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Tentang Kami</h1>
        <p>Menjadikan perjalanan Anda lebih nyaman, aman, dan efisien.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6" data-aos="fade-right">
                <h2 class="fw-bold mb-3" style="color: #1a2744;">Siapa Kami?</h2>
                <p>JetBus adalah penyedia layanan transportasi darat terkemuka di Indonesia yang menawarkan perjalanan nyaman, aman, dan terjangkau untuk semua penumpang.</p>
                <p class="text-muted">Kami selalu meningkatkan kualitas armada dan memperhatikan kebutuhan pelanggan demi kepuasan dan keamanan selama perjalanan.</p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <img src="{{ asset('assets/img/resepsionis.jpeg') }}" alt="Tentang Kami" class="w-100 rounded-3 shadow-sm" style="object-fit: cover; height: 320px;">
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: #f1f5f9;">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-6" data-aos="fade-right">
                <h3 class="fw-bold mb-3" style="color: #1a2744;">Visi</h3>
                <p>Menjadi perusahaan transportasi darat terdepan di Indonesia dengan mengutamakan kenyamanan, keamanan, dan inovasi.</p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h3 class="fw-bold mb-3" style="color: #1a2744;">Misi</h3>
                <ul class="ps-3">
                    <li class="mb-2">Menyediakan layanan transportasi berkualitas dan terpercaya.</li>
                    <li class="mb-2">Memastikan kenyamanan dan keamanan penumpang.</li>
                    <li class="mb-2">Meningkatkan efisiensi melalui inovasi teknologi.</li>
                    <li>Berkontribusi positif bagi masyarakat dan lingkungan.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4" style="color: #1a2744;">Nilai-Nilai Utama</h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <i class="bi bi-people fs-1 mb-3" style="color: #3b82f6;"></i>
                    <h5 class="fw-bold">Pelayanan</h5>
                    <p class="text-muted small mb-0">Kami mengutamakan kepuasan pelanggan dengan layanan terbaik.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <i class="bi bi-shield-lock fs-1 mb-3" style="color: #10b981;"></i>
                    <h5 class="fw-bold">Keamanan</h5>
                    <p class="text-muted small mb-0">Keamanan penumpang adalah prioritas utama kami.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <i class="bi bi-lightbulb fs-1 mb-3" style="color: #f59e0b;"></i>
                    <h5 class="fw-bold">Inovasi</h5>
                    <p class="text-muted small mb-0">Kami terus berinovasi untuk pengalaman perjalanan yang lebih baik.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>AOS.init({ duration: 500, once: true });</script>
@endpush
