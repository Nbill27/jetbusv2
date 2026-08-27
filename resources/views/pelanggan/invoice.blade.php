@extends('layouts.pelanggan')
@section('title', 'Invoice')

@push('styles')
<style>
    @media print {
        body * { visibility: hidden; }
        #invoice-print, #invoice-print * { visibility: visible; }
        #invoice-print { position: absolute; left: 0; top: 0; width: 100%; }
        .table { border-collapse: collapse !important; width: 100%; }
        .table th, .table td { border: 1px solid black !important; padding: 8px; }
    }
</style>
@endpush

@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header">
            <h2>Invoice Transaksi</h2>
        </div>
        <div class="card-body" id="invoice-print">
            <h5>JetBus Tiket</h5>
            <p>ID Transaksi: <strong>{{ $transaksi->id_transaksi }}</strong></p>

            <table class="table table-bordered">
                <tr>
                    <td><strong>Nama Pelanggan</strong></td>
                    <td>{{ $transaksi->pengguna->name }}</td>
                </tr>
                <tr>
                    <td><strong>Rute</strong></td>
                    <td>{{ $transaksi->jadwal->rute->lokasi_asal }} - {{ $transaksi->jadwal->rute->lokasi_tujuan }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Berangkat</strong></td>
                    <td>{{ $transaksi->jadwal->tanggal_berangkat->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td><strong>Waktu Berangkat</strong></td>
                    <td>{{ $transaksi->jadwal->waktu_berangkat }}</td>
                </tr>
                <tr>
                    <td><strong>Status Transaksi</strong></td>
                    <td>{{ ucfirst($transaksi->status) }}</td>
                </tr>
            </table>

            <h5>Bangku yang Dipesan</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No Bangku</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi->detailTransaksi as $detail)
                        <tr>
                            <td>{{ $detail->bangku->no_bangku }}</td>
                            <td>Rp {{ number_format($transaksi->total / $transaksi->detailTransaksi->count(), 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>Total Harga: <strong>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</strong></h4>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" onclick="printInvoice()">Cetak Invoice</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function printInvoice() { window.print(); }
</script>
@endpush
