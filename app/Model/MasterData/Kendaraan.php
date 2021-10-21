<?php

namespace App\Model\MasterData;

use App\Model\SingleSignOn\JenisBengkel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kendaraan extends Model
{
    protected $table = "tb_fo_master_kendaraan";

    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [
        'kode_kendaraan',
        'id_jenis_Bengkel',
        'nama_kendaraan',
        'id_merk_kendaraan',
        'id_jenis_kendaraan',
        'status'
    ];

    protected $hidden =[ 
       
    ];

    public $timestamps = true;



    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        $getId = DB::table('tb_fo_master_kendaraan')->orderBy('id_kendaraan','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_kendaraan'=> 0
            ]
            ];
    }

    public function JenisBengkel(){
        return $this->belongsTo(JenisBengkel::class, 'id_jenis_bengkel', 'id_jenis_bengkel');
    }

    public function Merk(){
        return $this->belongsTo(MerkKendaraan::class, 'id_merk_kendaraan', 'id_merk_kendaraan');
    }

    public function Jenis(){
        return $this->belongsTo(JenisKendaraan::class, 'id_jenis_kendaraan', 'id_jenis_kendaraan');
    }
}
