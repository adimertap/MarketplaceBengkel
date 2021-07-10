<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sparepart extends Model
{
    protected $table = "tb_inventory_master_sparepart";

    protected $primaryKey = 'id_sparepart';

    protected $fillable = [
        'id_jenis_sparepart', 'id_merk','kode_sparepart',  'nama_sparepart','slug', 'keterangan', 'id_bengkel'
    ];

    public function Galleries(){
        return $this->hasMany(SparepartGalleries::class, 'id_sparepart');
    }
    public function Galleries_one(){
        return $this->hasOne(SparepartGalleries::class, 'id_sparepart');
    }

    public function Merk(){
        return $this->belongsTo(SparepartMerk::class, 'id_merk', 'id_merk');
    }

    public function Category(){
        return $this->belongsTo(Category::class, 'id_jenis_sparepart', 'id_jenis_sparepart');
    }

    public function Bengkel(){
        return $this->hasOne(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }
    public function Detailtransaksi(){
        return $this->hasMany(DetailTransaksi::class, 'id_sparepart');

    }
    
    public function Rating(){
        return $this->hasMany(DetailTransaksi::class, 'id_sparepart')->where('status', 'DITERIMA');
    }

   

}
