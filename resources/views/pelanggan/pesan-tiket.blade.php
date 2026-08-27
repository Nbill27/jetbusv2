@extends('layouts.pelanggan')
@section('title', 'Pesan Tiket')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4" style="color: #0047AB;">Pesan Tiket</h2>
    <div class="card shadow rounded">
        <!-- Card Header -->
        <div class="card-header">
            <h4 class="fw-bold mb-3">Detail Perjalanan</h4>
            <div class="row">
                <div class="col-3 mb-3">
                    <i class="bi bi-geo-alt-fill me-2" style="color: #0047AB;"></i>
                    <strong>Rute:</strong> {{ $bus->asal }} - {{ $bus->tujuan }}
                </div>
                <div class="col mb-3">
                    <i class="bi bi-calendar-event me-2" style="color: #0047AB;"></i>
                    <strong>Tanggal:</strong> {{ $bus->tanggal_berangkat }}
                </div>
            </div>
            <div class="row">
                <div class="col-3 mb-3">
                    <i class="bi bi-clock-fill me-2" style="color: #0047AB;"></i>
                    <strong>Jam:</strong> {{ $bus->waktu_berangkat }}
                </div>
                <div class="col mb-3">
                    <i class="bi bi-currency-dollar me-2" style="color: #0047AB;"></i>
                    <strong>Harga per Kursi:</strong> Rp{{ number_format($bus->harga, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <form action="{{ route('pelanggan.proses-pesan') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <!-- Card Body -->
            <div class="card-body">
                <h4 class="fw-bold mb-2">Pilih Kursi</h4>
                <!-- Penjelasan Warna -->
                <div class="row mb-4">
                    <div class="col">
                        <span class="badge bg-primary text-white">Tersedia</span>
                        <span class="badge bg-danger text-white">Tidak Tersedia</span>
                    </div>

                    <!-- Input hidden -->
                    <input type="hidden" name="id_bus" value="{{ $bus->id_bus }}">
                    <input type="hidden" name="tanggal" value="{{ $bus->tanggal_berangkat }}">

                    <div class="row mb-3">
                        <div class="col-12">
                            <h5 class="text-center"><strong>Depan</strong></h5>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($kursi as $kursi_item)
                            <div class="col-3 mb-3">
                                @if($kursi_item->status === 'tersedia')
                                    <input type="checkbox" class="btn-check" name="kursi[]"
                                        id="kursi{{ $kursi_item->id_bangku }}" value="{{ $kursi_item->id_bangku }}">
                                    <label class="btn btn-outline-primary w-100" for="kursi{{ $kursi_item->id_bangku }}"
                                        style="cursor: pointer; transition: 0.3s;">
                                        {{ $kursi_item->no_bangku }}
                                    </label>
                                @else
                                    <label class="btn btn-outline-danger w-100" style="cursor: not-allowed;">
                                        {{ $kursi_item->no_bangku }}
                                    </label>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <h5 class="text-center"><strong>Belakang</strong></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success w-100 py-2" style="font-size: 1.1rem;">Pesan Sekarang</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function validateForm() {
        var kursiSelected = document.querySelectorAll('input[name="kursi[]"]:checked').length;
        if (kursiSelected === 0) {
            alert("Silakan pilih kursi terlebih dahulu!");
            return false;
        }
        return true;
    }
</script>
@endpush
