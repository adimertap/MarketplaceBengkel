<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PPH21 extends Model
{
   

    protected $table = "tb_payroll_master_pph21";

    protected $primaryKey = 'id_pph21';

    protected $fillable = [
        'nama_pph21',
        'kumulatif_tahunan',
        'besaran_pph21'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
