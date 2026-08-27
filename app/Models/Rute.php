<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rute';
    protected $primaryKey = 'id_rute';

    protected $fillable = ['lokasi_asal', 'lokasi_tujuan'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_rute', 'id_rute');
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'id_rute', 'id_rute');
    }
}
