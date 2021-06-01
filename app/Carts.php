<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = "tb_marketplace_carts";

    protected $primaryKey = 'id_carts';

    protected $fillable = [
        'id_user', 'id_bengkel'
    ];

    public function Bengkel(){
        return $this->hasOne(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }

    public function Detailcarts(){
        return $this->hasMany(Detailcarts::class, 'id_carts');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}


