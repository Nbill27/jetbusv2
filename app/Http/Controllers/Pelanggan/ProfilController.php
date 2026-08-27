<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function show()
    {
        $riwayat = Transaksi::with(['jadwal.rute'])
            ->where('id_pengguna', auth()->id())
            ->latest('tanggal_transaksi')
            ->get();

        return view('pelanggan.profil', compact('riwayat'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'no_hp' => 'required|regex:/^\d{10,13}$/',
        ]);

        auth()->user()->update($request->only(['name', 'email', 'no_hp']));

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah.']);
        }

        auth()->user()->update(['password' => $request->password]);

        return back()->with('password_success', 'Password berhasil diperbarui.');
    }
}
