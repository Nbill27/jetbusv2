@extends('layouts.app')
@section('title', 'Beranda | JetBus')

@push('styles')
<style>
    :root { --navy: #1a2744; --amber: #f59e0b; --slate: #f1f5f9; --white: #ffffff; }
    .hero-section { background: url('{{ asset('assets/img/beranda.png') }}') no-repeat center center/cover; position: relative; min-height: 450px; display: flex; align-items: center; }
    .hero-overlay { position: absolute; inset: 0; background: rgba(26,39,68,0.65); }
    .hero-content { position: relative; z-index: 1; padding: 3rem 0; }
    .hero-content h1 { color: var(--white); font-weight: 700; font-size: 2.5rem; margin-bottom: 0.75rem; }
    .hero-content p { color: rgba(255,255,255,0.85); font-size: 1.1rem; margin-bottom: 2rem; }
    .hero-form { background: var(--white); padding: 1.75rem; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); max-width: 900px; margin: 0 auto; }
    .hero-form .form-label { color: var(--text); font-weight: 600; margin-bottom: 0.25rem; font-size: 0.85rem; }
    .hero-form .form-select, .hero-form .form-control { border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; height: 46px; }
    .hero-form .form-select:focus, .hero-form .form-control:focus { border-color: var(--amber); box-shadow: 0 0 0 3px rgba(245,158,11,0.15); }
    .hero-form .btn-primary { background: var(--amber); color: var(--navy); border: none; font-weight: 600; padding: 0.75rem 1.25rem; border-radius: 6px; width: 100%; height: 46px; }
    .hero-form .btn-primary:hover { background: #d97706; color: var(--navy); }
    @media (max-width: 767px) { .hero-content h1 { font-size: 1.75rem; } }
</style>
@endpush

@section('content')
<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="fw-bold">JetBus</h1>
        <p>Pemesanan tiket bus cepat, mudah, terpercaya untuk perjalanan ke seluruh Indonesia.</p>
        <form class="hero-form" action="{{ route('cari-tiket') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Asal</label>
                    <select class="form-select" name="asal" required>
                        <option value="" selected disabled>Pilih kota asal</option>
                        @foreach($kotaAsal as $asal)
                            <option value="{{ $asal }}">{{ $asal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tujuan</label>
                    <select class="form-select" name="tujuan" required>
                        <option value="" selected disabled>Pilih kota tujuan</option>
                        @foreach($kotaTujuan as $tujuan)
                            <option value="{{ $tujuan }}">{{ $tujuan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Tanggal</label>
                    <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Pilih tanggal" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Kelas</label>
                    <select class="form-select" name="kelas" required>
                        <option value="" selected disabled>Pilih kelas</option>
                        <option value="Semua Kelas">Semua Kelas</option>
                        @foreach($kelasBus as $kelas)
                            <option value="{{ $kelas }}">{{ $kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Cari</label>
                    <button type="submit" class="btn btn-primary w-100">Cari Tiket</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" data-aos="fade-right">
                <div class="p-4"><i class="bi bi-emoji-smile text-success mb-3 fs-1"></i>
                    <h4 class="h6 fw-bold mb-2">Pelayanan Ramah</h4>
                    <p class="mb-0 small">Awak bus yang terlatih dan berpengalaman menemani setiap perjalanan Anda dengan pelayanan terbaik.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" data-aos="fade-left">
                <div class="p-4"><i class="bi bi-shield-check text-success mb-3 fs-1"></i>
                    <h4 class="h6 fw-bold mb-2">Keamanan Terjamin</h4>
                    <p class="mb-0 small">Armada rutin diperiksa dan mengikuti protokol keselamatan terbaik untuk perjalanan yang nyaman.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" data-aos="fade-right">
                <div class="p-4"><i class="bi bi-calendar2-check text-success mb-3 fs-1"></i>
                    <h4 class="h6 fw-bold mb-2">Fleksibel</h4>
                    <p class="mb-0 small">Pilih jam keberangkatan sesuai jadwal Anda. Tiket bisa diubah sesuai kebutuhan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" data-aos="fade-left">
                <div class="p-4"><i class="bi bi-globe text-success mb-3 fs-1"></i>
                    <h4 class="h6 fw-bold mb-2">Jaringan Luas</h4>
                    <p class="mb-0 small">Rute keberangkatan mencakup seluruh kota besar di Indonesia untuk kemudahan akses.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="text-center mb-4"><h2 class="fw-bold mb-2">Mengapa Memilih JetBus?</h2><p class="text-muted">Platform pemesanan terpercaya untuk perjalanan darat yang nyaman.</p></div>
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card h-100 border-0 shadow-sm text-center py-4" data-aos="fade-up"><i class="bi bi-bus-front text-success mb-3 fs-1"></i><h5 class="fw-bold mb-3">Armada Modern</h5><p class="mb-0 small">Bus dengan AVAC2, reclining seat, dan hiburan onboard untuk kenyamanan maksimal.</p></div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100 border-0 shadow-sm text-center py-4" data-aos="fade-up"><i class="bi bi-credit-card text-success mb-3 fs-1"></i><h5 class="fw-bold mb-3">Pembayaran Mudah</h5><p class="mb-0 small">Multi-channel payment: transfer bank, QRIS, e-wallet. Invoice otomatis setelah transaksi.</p></div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100 border-0 shadow-sm text-center py-4" data-aos="fade-up"><i class="bi bi-headset text-success mb-3 fs-1"></i><h5 class="fw-bold mb-3">Support 24/7</h5><p class="mb-0 small">Tim customer service siap membantu kapan saja untuk pertanyaan atau kendala Anda.</p></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const inputTanggal = document.getElementById('tanggal');
    inputTanggal.addEventListener('focus', () => { inputTanggal.type = 'date'; });
    inputTanggal.addEventListener('blur', () => { if (!inputTanggal.value) inputTanggal.type = 'text'; });
    AOS.init({ duration: 500, once: true });
</script>
@endpush
