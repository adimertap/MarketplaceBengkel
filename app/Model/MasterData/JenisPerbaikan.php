<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisPerbaikan extends Model
{
    protected $table = "tb_fo_master_jenis_perbaikan";

    protected $primaryKey = 'id_jenis_perbaikan';

    protected $fillable = [
        'kode_jenis_perbaikan',
        'nama_jenis_perbaikan',
        'group_jenis_perbaikan',
        'harga_jenis_perbaikan',
        'status'
    ];

    protected $hidden =[ 
       
    ];

    public $timestamps = true;

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        $getId = DB::table('tb_fo_master_jenis_perbaikan')->orderBy('id_jenis_perbaikan','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_jenis_perbaikan'=> 0
            ]
            ];
    }
}
