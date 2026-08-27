@extends('layouts.pelanggan')
@section('title', 'Daftar Tiket')

@section('content')
<div class="container my-4">
    <!-- Alert Ucapan Selamat Datang -->
    <div class="alert alert-primary text-center">
        Selamat datang di JetBus <strong>{{ auth()->user()->name }}</strong>. Ayo pesan tiket sekarang!
    </div>

    <h2 class="text-center mb-4" style="color: #0047AB;">Daftar Tiket Bus</h2>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('pelanggan.dashboard') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <select class="form-select" name="asal">
                <option value="" selected disabled>Pilih Kota Asal</option>
                @foreach($kotaAsal as $option)
                    <option value="{{ $option }}" {{ request('asal') == $option ? 'selected' : '' }}>{{ $option }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select" name="tujuan">
                <option value="" selected disabled>Pilih Kota Tujuan</option>
                @foreach($kotaTujuan as $option)
                    <option value="{{ $option }}" {{ request('tujuan') == $option ? 'selected' : '' }}>{{ $option }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="tanggal" id="inputTgl"
                placeholder="Tanggal Berangkat" value="{{ request('tanggal') }}">
        </div>
        <div class="col-md-2">
            <select class="form-select" name="kelas">
                <option value="">Pilih Kelas</option>
                <option value="semua Kelas" {{ request('kelas') == 'semua Kelas' ? 'selected' : '' }}>Semua Kelas</option>
                @foreach($kelasBus as $option)
                    <option value="{{ $option }}" {{ request('kelas') == $option ? 'selected' : '' }}>{{ $option }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </div>
    </form>

    <!-- Daftar Bus -->
    @if($buses->isEmpty())
        <div class="alert alert-warning text-center">
            Tidak ada tiket yang tersedia untuk pencarian ini.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($buses as $bus)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ asset('assets/upload/' . $bus->foto) }}" class="card-img-top" alt="Bus"
                            style="height: 180px; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                        <div class="card-body bg-light">
                            <h5 class="card-title text-dark fw-bold">
                                {{ $bus->kelas }}
                                <span class="badge bg-warning text-dark">Rp{{ number_format($bus->harga, 0, ',', '.') }}</span>
                            </h5>
                            <p class="mb-2"><i class="bi bi-calendar"></i> {{ $bus->tanggal_berangkat }}</p>
                            <p class="mb-2"><i class="bi bi-clock"></i> {{ $bus->jam_berangkat }}</p>
                            <p class="mb-2"><i class="bi bi-geo-alt"></i> {{ $bus->asal }} ke {{ $bus->tujuan }}</p>
                            <p class="mb-0"><i class="bi bi-chair"></i> Kursi Tersedia:
                                <span class="fw-bold text-success">{{ $bus->kursi_tersedia }}</span>
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">
                            <form action="{{ route('pelanggan.pesan-tiket') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_bus" value="{{ $bus->id_bus }}">
                                <input type="hidden" name="tanggal" value="{{ $bus->tanggal_berangkat }}">
                                <button type="submit" class="btn btn-sm w-100" style="background-color: #0047AB; color: white;">Pesan Tiket</button>
                            </form>
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
    const inputTanggal = document.getElementById('inputTgl');
    if (inputTanggal) {
        inputTanggal.addEventListener('focus', function() { inputTanggal.type = 'date'; });
        inputTanggal.addEventListener('blur', function() { if (!inputTanggal.value) inputTanggal.type = 'text'; });
    }
</script>
@endpush
