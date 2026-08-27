<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bangku extends Model
{
    protected $table = 'bangku';
    protected $primaryKey = 'id_bangku';

    protected $fillable = ['id_bus', 'no_bangku', 'status'];

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'id_bus');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_bangku', 'id_bangku');
    }
}
