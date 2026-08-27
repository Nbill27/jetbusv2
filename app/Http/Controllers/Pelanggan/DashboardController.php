<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Rute;
use App\Models\TipeBus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $kotaAsal = Rute::distinct()->pluck('lokasi_asal');
        $kotaTujuan = Rute::distinct()->pluck('lokasi_tujuan');
        $kelasBus = TipeBus::pluck('nama_tipe');

        $query = Bus::query()
            ->join('jadwal', 'bus.id_bus', '=', 'jadwal.id_bus')
            ->join('rute', 'jadwal.id_rute', '=', 'rute.id_rute')
            ->join('tiket', function ($join) {
                $join->on('jadwal.id_rute', '=', 'tiket.id_rute')
                    ->on('bus.id_tipe', '=', 'tiket.id_tipe');
            })
            ->join('tipe_bus', 'bus.id_tipe', '=', 'tipe_bus.id_tipe')
            ->leftJoin('bangku', 'bus.id_bus', '=', 'bangku.id_bus');

        if ($request->filled('asal')) {
            $query->where('rute.lokasi_asal', $request->asal);
        }
        if ($request->filled('tujuan')) {
            $query->where('rute.lokasi_tujuan', $request->tujuan);
        }
        if ($request->filled('tanggal')) {
            $query->where('jadwal.tanggal_berangkat', $request->tanggal);
        }
        if ($request->filled('kelas') && $request->kelas !== 'Semua Kelas') {
            $query->where('tipe_bus.nama_tipe', $request->kelas);
        }

        $buses = $query->select(
            'bus.id_bus',
            'rute.lokasi_asal as asal',
            'rute.lokasi_tujuan as tujuan',
            'jadwal.waktu_berangkat as jam_berangkat',
            'jadwal.tanggal_berangkat',
            'tipe_bus.nama_tipe as kelas',
            'tiket.harga',
            'tipe_bus.foto',
        )
            ->selectRaw("COUNT(CASE WHEN bangku.status = 'tersedia' THEN 1 END) as kursi_tersedia")
            ->groupBy('bus.id_bus', 'rute.lokasi_asal', 'rute.lokasi_tujuan', 'jadwal.waktu_berangkat', 'jadwal.tanggal_berangkat', 'tipe_bus.nama_tipe', 'tiket.harga', 'tipe_bus.foto')
            ->get();

        return view('pelanggan.dashboard', compact('buses', 'kotaAsal', 'kotaTujuan', 'kelasBus'));
    }
}
