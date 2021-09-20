<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;

class PTKP extends Model
{
    protected $table = "tb_payroll_master_ptkp";

    protected $primaryKey = 'id_ptkp';

    protected $fillable = [
        'nama_ptkp',
        'besaran_ptkp',
        'keterangan_ptkp'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
