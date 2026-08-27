<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;

class InvoiceController extends Controller
{
    public function show(Transaksi $transaksi)
    {
        if ($transaksi->id_pengguna !== auth()->id()) {
            abort(403);
        }

        $transaksi->load(['pengguna', 'jadwal.rute', 'jadwal.bus.tipeBus', 'detailTransaksi.bangku']);

        return view('pelanggan.invoice', compact('transaksi'));
    }
}
