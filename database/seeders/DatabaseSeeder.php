<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TipeBus;
use App\Models\Rute;
use App\Models\Bus;
use App\Models\Jadwal;
use App\Models\Tiket;
use App\Models\Bangku;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin JetBus',
            'email' => 'admin@jetbus.com',
            'no_hp' => '081234567890',
            'peran' => 'admin',
            'password' => 'password',
        ]);

        // Pelanggan sample
        User::create([
            'name' => 'Nabil',
            'email' => 'nabil@gmail.com',
            'no_hp' => '089876543210',
            'peran' => 'pelanggan',
            'password' => 'password',
        ]);

        // Tipe Bus
        $eksekutif = TipeBus::create(['nama_tipe' => 'Eksekutif', 'deskripsi' => 'Bus mewah dengan kursi rebahan, AC, TV, dan snack gratis.']);
        $bisnis = TipeBus::create(['nama_tipe' => 'Bisnis', 'deskripsi' => 'Bus nyaman dengan AC dan kursi empuk.']);
        $ekonomi = TipeBus::create(['nama_tipe' => 'Ekonomi', 'deskripsi' => 'Bus standar dengan harga terjangkau.']);

        // Rute
        $rute1 = Rute::create(['lokasi_asal' => 'Jakarta', 'lokasi_tujuan' => 'Bandung']);
        $rute2 = Rute::create(['lokasi_asal' => 'Jakarta', 'lokasi_tujuan' => 'Semarang']);
        $rute3 = Rute::create(['lokasi_asal' => 'Bandung', 'lokasi_tujuan' => 'Surabaya']);
        $rute4 = Rute::create(['lokasi_asal' => 'Semarang', 'lokasi_tujuan' => 'Surabaya']);
        $rute5 = Rute::create(['lokasi_asal' => 'Jakarta', 'lokasi_tujuan' => 'Surabaya']);

        // Bus
        $bus1 = Bus::create(['id_tipe' => $eksekutif->id_tipe, 'no_plat' => 'B 1234 JB']);
        $bus2 = Bus::create(['id_tipe' => $bisnis->id_tipe, 'no_plat' => 'B 5678 JB']);
        $bus3 = Bus::create(['id_tipe' => $ekonomi->id_tipe, 'no_plat' => 'D 9012 JB']);

        // Bangku (per bus, 20 kursi)
        foreach ([$bus1, $bus2, $bus3] as $bus) {
            for ($i = 1; $i <= 20; $i++) {
                Bangku::create([
                    'id_bus' => $bus->id_bus,
                    'no_bangku' => str_pad($i, 2, '0', STR_PAD_LEFT),
                    'status' => 'tersedia',
                ]);
            }
        }

        // Jadwal (beberapa hari kedepan)
        $dates = [now()->addDays(1)->format('Y-m-d'), now()->addDays(2)->format('Y-m-d'), now()->addDays(3)->format('Y-m-d')];

        foreach ($dates as $date) {
            Jadwal::create(['id_bus' => $bus1->id_bus, 'id_rute' => $rute1->id_rute, 'tanggal_berangkat' => $date, 'waktu_berangkat' => '08:00']);
            Jadwal::create(['id_bus' => $bus2->id_bus, 'id_rute' => $rute2->id_rute, 'tanggal_berangkat' => $date, 'waktu_berangkat' => '10:00']);
            Jadwal::create(['id_bus' => $bus3->id_bus, 'id_rute' => $rute5->id_rute, 'tanggal_berangkat' => $date, 'waktu_berangkat' => '14:00']);
        }

        // Tiket (harga per rute per tipe)
        Tiket::create(['id_rute' => $rute1->id_rute, 'id_tipe' => $eksekutif->id_tipe, 'harga' => 350000]);
        Tiket::create(['id_rute' => $rute2->id_rute, 'id_tipe' => $bisnis->id_tipe, 'harga' => 250000]);
        Tiket::create(['id_rute' => $rute3->id_rute, 'id_tipe' => $ekonomi->id_tipe, 'harga' => 150000]);
        Tiket::create(['id_rute' => $rute4->id_rute, 'id_tipe' => $bisnis->id_tipe, 'harga' => 200000]);
        Tiket::create(['id_rute' => $rute5->id_rute, 'id_tipe' => $ekonomi->id_tipe, 'harga' => 300000]);
        Tiket::create(['id_rute' => $rute5->id_rute, 'id_tipe' => $eksekutif->id_tipe, 'harga' => 500000]);
    }
}
