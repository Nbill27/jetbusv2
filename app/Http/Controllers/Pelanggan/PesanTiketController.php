<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Bangku;
use App\Models\Bus;
use App\Models\DetailTransaksi;
use App\Models\Jadwal;
use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesanTiketController extends Controller
{
    public function pilihKursi(Request $request)
    {
        $request->validate([
            'id_bus' => 'required|exists:bus,id_bus',
            'tanggal' => 'required|date',
        ]);

        $bus = Bus::with('tipeBus')
            ->join('jadwal', 'bus.id_bus', '=', 'jadwal.id_bus')
            ->join('rute', 'jadwal.id_rute', '=', 'rute.id_rute')
            ->join('tiket', function ($join) {
                $join->on('jadwal.id_rute', '=', 'tiket.id_rute')
                    ->on('bus.id_tipe', '=', 'tiket.id_tipe');
            })
            ->join('tipe_bus', 'bus.id_tipe', '=', 'tipe_bus.id_tipe')
            ->where('bus.id_bus', $request->id_bus)
            ->where('jadwal.tanggal_berangkat', $request->tanggal)
            ->select(
                'bus.id_bus',
                'tipe_bus.nama_tipe as kelas',
                'rute.lokasi_asal as asal',
                'rute.lokasi_tujuan as tujuan',
                'jadwal.waktu_berangkat',
                'jadwal.tanggal_berangkat',
                'tiket.harga'
            )
            ->first();

        if (!$bus) {
            return redirect()->route('pelanggan.dashboard')->with('error', 'Bus tidak ditemukan.');
        }

        $kursi = Bangku::where('id_bus', $request->id_bus)->get();

        return view('pelanggan.pesan-tiket', compact('bus', 'kursi'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'id_bus' => 'required|exists:bus,id_bus',
            'tanggal' => 'required|date',
            'kursi' => 'required|array|min:1',
            'kursi.*' => 'exists:bangku,id_bangku',
        ]);

        $jadwal = Jadwal::where('id_bus', $request->id_bus)
            ->where('tanggal_berangkat', $request->tanggal)
            ->first();

        if (!$jadwal) {
            return back()->with('error', 'Jadwal tidak ditemukan.');
        }

        $tiket = Tiket::where('id_rute', $jadwal->id_rute)
            ->whereHas('tipeBus', function ($q) use ($request) {
                $q->whereHas('bus', function ($q2) use ($request) {
                    $q2->where('id_bus', $request->id_bus);
                });
            })
            ->first();

        $hargaPerKursi = $tiket ? $tiket->harga : 0;
        $totalHarga = $hargaPerKursi * count($request->kursi);

        $transaksi = DB::transaction(function () use ($request, $jadwal, $totalHarga) {
            $transaksi = Transaksi::create([
                'id_pengguna' => auth()->id(),
                'id_jadwal' => $jadwal->id_jadwal,
                'total' => $totalHarga,
                'status' => 'tertunda',
                'tanggal_transaksi' => now(),
            ]);

            foreach ($request->kursi as $idBangku) {
                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_bangku' => $idBangku,
                ]);

                Bangku::where('id_bangku', $idBangku)->update(['status' => 'dipesan']);
            }

            return $transaksi;
        });

        return redirect()->route('pelanggan.invoice', $transaksi->id_transaksi)
            ->with('success', 'Tiket berhasil dipesan!');
    }
}
