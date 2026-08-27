<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeBus extends Model
{
    protected $table = 'tipe_bus';
    protected $primaryKey = 'id_tipe';

    protected $fillable = ['nama_tipe', 'deskripsi', 'foto'];

    public function bus()
    {
        return $this->hasMany(Bus::class, 'id_tipe', 'id_tipe');
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'id_tipe', 'id_tipe');
    }
}
