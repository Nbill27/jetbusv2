<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index()
    {
        $rute = Rute::latest()->paginate(15);
        return view('admin.rute.index', compact('rute'));
    }

    public function create()
    {
        return view('admin.rute.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi_asal' => 'required|string|max:255',
            'lokasi_tujuan' => 'required|string|max:255',
        ]);

        Rute::create($request->only(['lokasi_asal', 'lokasi_tujuan']));

        return redirect()->route('admin.rute.index')->with('success', 'Rute berhasil ditambahkan.');
    }

    public function edit(Rute $rute)
    {
        return view('admin.rute.edit', compact('rute'));
    }

    public function update(Request $request, Rute $rute)
    {
        $request->validate([
            'lokasi_asal' => 'required|string|max:255',
            'lokasi_tujuan' => 'required|string|max:255',
        ]);

        $rute->update($request->only(['lokasi_asal', 'lokasi_tujuan']));

        return redirect()->route('admin.rute.index')->with('success', 'Rute berhasil diperbarui.');
    }

    public function destroy(Rute $rute)
    {
        $rute->delete();
        return redirect()->route('admin.rute.index')->with('success', 'Rute berhasil dihapus.');
    }
}
