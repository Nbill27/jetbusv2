<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = ['id_bus', 'id_rute', 'tanggal_berangkat', 'waktu_berangkat'];

    protected function casts(): array
    {
        return [
            'tanggal_berangkat' => 'date',
            'waktu_berangkat' => 'datetime:H:i',
        ];
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'id_bus');
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_rute', 'id_rute');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_jadwal', 'id_jadwal');
    }
}
