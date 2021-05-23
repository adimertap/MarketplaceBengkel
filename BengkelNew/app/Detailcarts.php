<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailcarts extends Model
{
    protected $table = "tb_marketplace_detail_carts";

    protected $primaryKey = 'id_detail_carts';

    protected $fillable = [
        'id_sparepart', 'jumlah', 'id_carts'
    ];

    public function Sparepart(){
        return $this->hasOne(Sparepart::class, 'id_sparepart', 'id_sparepart');
    }
     public function Carts(){
        return $this->hasOne(Carts::class, 'id_carts', 'id_carts');
    }
}


