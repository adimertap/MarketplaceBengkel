<?php

namespace App\Model\MasterData;

use App\Model\SingleSignOn\JenisBengkel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MerkKendaraan extends Model
{
    protected $table = "tb_fo_master_merk_kendaraan";

    protected $primaryKey = 'id_merk_kendaraan';

    protected $fillable = [
        'kode_merk_kendaraan',
        'merk_kendaraan',
        'id_jenis_bengkel'
    ];

    protected $hidden =[ 
       
       
    ];

    public $timestamps = false;

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        $getId = DB::table('tb_fo_master_merk_kendaraan')->orderBy('id_merk_kendaraan','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_jenis_perbaikan'=> 0
            ]
            ];
    }

    public function JenisBengkel(){
        return $this->belongsTo(JenisBengkel::class, 'id_jenis_bengkel', 'id_jenis_bengkel');
    }

}
