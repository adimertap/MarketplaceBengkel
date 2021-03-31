<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = "tb_inventory_master_jenis_sparepart";

    public $timestamps = false;
    protected $primaryKey = 'id_jenis_sparepart';


    protected $fillable = [
        'jenis_sparepart', 'keterangan'
    ];

}
