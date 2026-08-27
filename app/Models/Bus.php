<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus';
    protected $primaryKey = 'id_bus';

    protected $fillable = ['id_tipe', 'no_plat'];

    public function tipeBus()
    {
        return $this->belongsTo(TipeBus::class, 'id_tipe', 'id_tipe');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_bus', 'id_bus');
    }

    public function bangku()
    {
        return $this->hasMany(Bangku::class, 'id_bus', 'id_bus');
    }
}
