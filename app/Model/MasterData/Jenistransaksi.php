<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenistransaksi extends Model
{
    use SoftDeletes;

    protected $table = "tb_accounting_master_jenis_transaksi";

    protected $primaryKey = 'id_jenis_transaksi';

    protected $fillable = [
        'nama_transaksi',
    ];

    protected $hidden =[ 
        'deleted_at'
    ];

    public $timestamps = true;

}
