<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konversi extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_master_konversi";

    protected $primaryKey = 'id_konversi';

    protected $fillable = [
        'satuan',
        'status_konversi'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        'deleted_at',
       
    ];

    public $timestamps = false;
}
