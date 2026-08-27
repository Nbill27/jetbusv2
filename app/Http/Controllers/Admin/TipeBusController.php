<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipeBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipeBusController extends Controller
{
    public function index()
    {
        $tipeBus = TipeBus::latest()->paginate(15);
        return view('admin.tipe-bus.index', compact('tipeBus'));
    }

    public function create()
    {
        return view('admin.tipe-bus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tipe' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['nama_tipe', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        TipeBus::create($data);

        return redirect()->route('admin.tipe-bus.index')->with('success', 'Tipe bus berhasil ditambahkan.');
    }

    public function edit(TipeBus $tipeBu)
    {
        return view('admin.tipe-bus.edit', ['tipeBus' => $tipeBu]);
    }

    public function update(Request $request, TipeBus $tipeBu)
    {
        $request->validate([
            'nama_tipe' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['nama_tipe', 'deskripsi']);

        if ($request->hasFile('foto')) {
            if ($tipeBu->foto) {
                Storage::disk('public')->delete($tipeBu->foto);
            }
            $data['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        $tipeBu->update($data);

        return redirect()->route('admin.tipe-bus.index')->with('success', 'Tipe bus berhasil diperbarui.');
    }

    public function destroy(TipeBus $tipeBu)
    {
        if ($tipeBu->foto) {
            Storage::disk('public')->delete($tipeBu->foto);
        }
        $tipeBu->delete();

        return redirect()->route('admin.tipe-bus.index')->with('success', 'Tipe bus berhasil dihapus.');
    }
}
