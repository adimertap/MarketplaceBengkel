<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailcarts extends Model
{
    protected $table = "tb_marketplace_detail_carts";

    protected $primaryKey = 'id_detail_carts';

    protected $fillable = [
        'id_detail_sparepart', 'jumlah', 'id_carts'
    ];

    public function DetailSparepart(){
        return $this->hasOne(DetailSparepart::class, 'id_detail_sparepart', 'id_detail_sparepart');
    }
     public function Carts(){
        return $this->hasOne(Carts::class, 'id_carts', 'id_carts');
    }
}


