<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['pengguna', 'jadwal.rute', 'jadwal.bus'])
            ->latest('tanggal_transaksi')
            ->paginate(15);

        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['pengguna', 'jadwal.rute', 'jadwal.bus.tipeBus', 'detailTransaksi.bangku']);
        return view('admin.transaksi.show', compact('transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'status' => 'required|in:tertunda,dibayar,gagal,dibatalkan',
        ]);

        $transaksi->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui.');
    }
}
