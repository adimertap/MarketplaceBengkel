<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = "tb_inventory_master_jenis_sparepart";

    public $timestamps = false;
    protected $primaryKey = 'id_jenis_sparepart';


    protected $fillable = [
        'jenis_sparepart', 'status_jenis', 'slug'
    ];

    
}
