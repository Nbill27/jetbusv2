<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';

    protected $fillable = ['id_rute', 'id_tipe', 'harga'];

    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_rute', 'id_rute');
    }

    public function tipeBus()
    {
        return $this->belongsTo(TipeBus::class, 'id_tipe', 'id_tipe');
    }
}
