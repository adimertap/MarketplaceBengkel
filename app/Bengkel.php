<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    protected $table ='tb_marketplace_bengkel';
    protected $primaryKey = 'id_bengkel';

    public $timestamps = false;

    public function Desa(){
        return $this->hasOne(DesaBaru::class, 'id_desa', 'id_desa');
    }
  }
