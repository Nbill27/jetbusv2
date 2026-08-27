<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['pengguna', 'jadwal.bus']);

        if ($request->filled('start_date')) {
            $query->whereDate('tanggal_transaksi', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('tanggal_transaksi', '<=', $request->end_date);
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $transaksi = $query->latest('tanggal_transaksi')->paginate(20);
        $totalPendapatan = (clone $query)->where('status', 'dibayar')->sum('total');

        return view('admin.laporan', compact('transaksi', 'totalPendapatan'));
    }
}
