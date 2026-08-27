<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Bus;
use App\Models\Rute;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['bus.tipeBus', 'rute'])->latest()->paginate(15);
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $buses = Bus::with('tipeBus')->get();
        $rute = Rute::all();
        return view('admin.jadwal.create', compact('buses', 'rute'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bus' => 'required|exists:bus,id_bus',
            'id_rute' => 'required|exists:rute,id_rute',
            'tanggal_berangkat' => 'required|date',
            'waktu_berangkat' => 'required',
        ]);

        Jadwal::create($request->only(['id_bus', 'id_rute', 'tanggal_berangkat', 'waktu_berangkat']));

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $buses = Bus::with('tipeBus')->get();
        $rute = Rute::all();
        return view('admin.jadwal.edit', compact('jadwal', 'buses', 'rute'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'id_bus' => 'required|exists:bus,id_bus',
            'id_rute' => 'required|exists:rute,id_rute',
            'tanggal_berangkat' => 'required|date',
            'waktu_berangkat' => 'required',
        ]);

        $jadwal->update($request->only(['id_bus', 'id_rute', 'tanggal_berangkat', 'waktu_berangkat']));

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
