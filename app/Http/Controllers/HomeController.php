<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\TipeBus;
use App\Models\Bus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kotaAsal = Rute::distinct()->pluck('lokasi_asal');
        $kotaTujuan = Rute::distinct()->pluck('lokasi_tujuan');
        $kelasBus = TipeBus::pluck('nama_tipe');

        return view('home', compact('kotaAsal', 'kotaTujuan', 'kelasBus'));
    }

    public function about()
    {
        return view('about');
    }

    public function armada()
    {
        $tipeBus = TipeBus::all();
        return view('armada', compact('tipeBus'));
    }

    public function agen()
    {
        return view('agen');
    }

    public function cariTiket(Request $request)
    {
        $request->validate([
            'asal' => 'required',
            'tujuan' => 'required',
            'tanggal' => 'required|date',
        ]);

        $query = Bus::with(['tipeBus', 'bangku'])
            ->join('jadwal', 'bus.id_bus', '=', 'jadwal.id_bus')
            ->join('rute', 'jadwal.id_rute', '=', 'rute.id_rute')
            ->join('tiket', function ($join) {
                $join->on('jadwal.id_rute', '=', 'tiket.id_rute')
                    ->on('bus.id_tipe', '=', 'tiket.id_tipe');
            })
            ->join('tipe_bus', 'bus.id_tipe', '=', 'tipe_bus.id_tipe')
            ->leftJoin('bangku', 'bus.id_bus', '=', 'bangku.id_bus')
            ->where('rute.lokasi_asal', $request->asal)
            ->where('rute.lokasi_tujuan', $request->tujuan)
            ->where('jadwal.tanggal_berangkat', $request->tanggal);

        if ($request->kelas && $request->kelas !== 'Semua Kelas') {
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

        return view('cari-tiket', [
            'buses' => $buses,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'tanggal' => $request->tanggal,
            'kelas' => $request->kelas ?? 'Semua Kelas',
        ]);
    }
}
