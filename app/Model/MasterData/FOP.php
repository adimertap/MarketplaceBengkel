<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FOP extends Model
{
    protected $table = "tb_accounting_master_fop";

    protected $primaryKey = 'id_fop';

    protected $fillable = [
        'kode_fop',
        'nama_fop'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        $getId = DB::table('tb_accounting_master_fop')->orderBy('id_fop','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_fop'=> 0
            ]
            ];
    }

}
