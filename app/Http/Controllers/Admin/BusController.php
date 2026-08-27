<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\TipeBus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::with('tipeBus')->latest()->paginate(15);
        return view('admin.bus.index', compact('buses'));
    }

    public function create()
    {
        $tipeBus = TipeBus::all();
        return view('admin.bus.create', compact('tipeBus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tipe' => 'required|exists:tipe_bus,id_tipe',
            'no_plat' => 'required|string|unique:bus,no_plat',
        ]);

        Bus::create($request->only(['id_tipe', 'no_plat']));

        return redirect()->route('admin.bus.index')->with('success', 'Bus berhasil ditambahkan.');
    }

    public function edit(Bus $bu)
    {
        $tipeBus = TipeBus::all();
        return view('admin.bus.edit', ['bus' => $bu, 'tipeBus' => $tipeBus]);
    }

    public function update(Request $request, Bus $bu)
    {
        $request->validate([
            'id_tipe' => 'required|exists:tipe_bus,id_tipe',
            'no_plat' => 'required|string|unique:bus,no_plat,' . $bu->id_bus . ',id_bus',
        ]);

        $bu->update($request->only(['id_tipe', 'no_plat']));

        return redirect()->route('admin.bus.index')->with('success', 'Bus berhasil diperbarui.');
    }

    public function destroy(Bus $bu)
    {
        $bu->delete();
        return redirect()->route('admin.bus.index')->with('success', 'Bus berhasil dihapus.');
    }
}
