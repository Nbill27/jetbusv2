<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Rute;
use App\Models\Transaksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBus = Bus::count();
        $totalRute = Rute::count();
        $totalPelanggan = User::where('peran', 'pelanggan')->count();
        $totalPendapatan = Transaksi::where('status', 'dibayar')
            ->whereDate('tanggal_transaksi', today())
            ->sum('total');

        $transaksiTerbaru = Transaksi::with(['pengguna', 'jadwal'])
            ->latest('tanggal_transaksi')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBus',
            'totalRute',
            'totalPelanggan',
            'totalPendapatan',
            'transaksiTerbaru'
        ));
    }
}
