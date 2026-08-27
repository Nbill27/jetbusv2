<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use App\Models\Rute;
use App\Models\TipeBus;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tiket = Tiket::with(['rute', 'tipeBus'])->latest()->paginate(15);
        return view('admin.tiket.index', compact('tiket'));
    }

    public function create()
    {
        $rute = Rute::all();
        $tipeBus = TipeBus::all();
        return view('admin.tiket.create', compact('rute', 'tipeBus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rute' => 'required|exists:rute,id_rute',
            'id_tipe' => 'required|exists:tipe_bus,id_tipe',
            'harga' => 'required|integer|min:0',
        ]);

        Tiket::create($request->only(['id_rute', 'id_tipe', 'harga']));
        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil ditambahkan.');
    }

    public function edit(Tiket $tiket)
    {
        $rute = Rute::all();
        $tipeBus = TipeBus::all();
        return view('admin.tiket.edit', compact('tiket', 'rute', 'tipeBus'));
    }

    public function update(Request $request, Tiket $tiket)
    {
        $request->validate([
            'id_rute' => 'required|exists:rute,id_rute',
            'id_tipe' => 'required|exists:tipe_bus,id_tipe',
            'harga' => 'required|integer|min:0',
        ]);

        $tiket->update($request->only(['id_rute', 'id_tipe', 'harga']));
        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy(Tiket $tiket)
    {
        $tiket->delete();
        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
