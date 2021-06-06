<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = "tb_reservasi";

    protected $primaryKey = 'id_reservasi';

    protected $fillable = [
        'id_bengkel', 'id_kendaraan', 'id_customer_bengkel', 'no_plat', 'kode_reservasi','status', 'keluhan_kendaraan', 'kode_reservasi', 'id_user'
    ];
   
    public function Bengkel(){
        return $this->hasOne(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }

    public function Kendaraan(){
        return $this->hasOne(Kendaraan::class, 'id_kendaraan', 'id_kendaraan');
    }


}
