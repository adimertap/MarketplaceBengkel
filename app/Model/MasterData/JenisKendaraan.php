<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    protected $table = "tb_fo_master_jenis_kendaraan";

    protected $primaryKey = 'id_jenis_kendaraan';

    protected $fillable = [
        'jenis_kendaraan',
        'keterangan',
    ];

    protected $hidden =[ 
       
       
    ];

    public $timestamps = false;

}
