<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bangku;
use App\Models\Bus;
use Illuminate\Http\Request;

class BangkuController extends Controller
{
    public function index(Request $request)
    {
        $buses = Bus::with('tipeBus')->get();
        $selectedBus = $request->id_bus;
        $bangku = $selectedBus ? Bangku::where('id_bus', $selectedBus)->get() : collect();

        return view('admin.bangku.index', compact('buses', 'bangku', 'selectedBus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bus' => 'required|exists:bus,id_bus',
            'no_bangku' => 'required|string',
        ]);

        Bangku::create($request->only(['id_bus', 'no_bangku']));
        return redirect()->route('admin.bangku.index', ['id_bus' => $request->id_bus])->with('success', 'Bangku berhasil ditambahkan.');
    }

    public function destroy(Bangku $bangku)
    {
        $busId = $bangku->id_bus;
        $bangku->delete();
        return redirect()->route('admin.bangku.index', ['id_bus' => $busId])->with('success', 'Bangku berhasil dihapus.');
    }
}
