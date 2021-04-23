<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "tb_marketplace_cart";

    protected $primaryKey = 'id_cart';

    protected $fillable = [
        'id_user', 'id_sparepart', 'jumlah'
    ];

    public function Sparepart(){
        return $this->hasOne(Sparepart::class, 'id_sparepart', 'id_sparepart');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}

