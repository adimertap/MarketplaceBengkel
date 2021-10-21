<?php

namespace App\Model\MasterData;

use App\Model\SingleSignOn\JenisBengkel;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    protected $table = "tb_fo_master_jenis_kendaraan";

    protected $primaryKey = 'id_jenis_kendaraan';

    protected $fillable = [
        'jenis_kendaraan',
        'keterangan',
        'id_jenis_bengkel'
    ];

    protected $hidden =[ 
       
       
    ];

    public $timestamps = false;

    public function JenisBengkel(){
        return $this->belongsTo(JenisBengkel::class, 'id_jenis_bengkel', 'id_jenis_bengkel');
    }

}
