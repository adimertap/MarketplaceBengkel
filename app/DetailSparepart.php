<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSparepart extends Model
{
    protected $table = "tb_inventory_detail_sparepart";

    protected $primaryKey = 'id_detail_sparepart';

    protected $fillable = [
    	'id_sparepart',
        'id_gudang',
        'id_rak',
        'qty_stok',
        'stok_min',
        'status_jumlah',
        'harga_market',
        'keterangan'
    ];

    protected $hidden =[ 

    ];

    public $timestamps = false;

    public function Sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'id_sparepart', 'id_sparepart');
    }

       public function Galleries(){
        return $this->hasMany(SparepartGalleries::class, 'id_detail_sparepart');
    }
    public function Galleries_one(){
        return $this->hasOne(SparepartGalleries::class, 'id_detail_sparepart');
    }

     public function Bengkel(){
        return $this->hasOne(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }
    public function Detailtransaksi(){
        return $this->hasMany(DetailTransaksi::class, 'id_detail_sparepart');
    }
    
    public function Rating(){
        return $this->hasMany(DetailTransaksi::class, 'id_detail_sparepart')->where('status', 'DITERIMA');
    }
    // public function Gallery()
    // {
    //     return $this->hasMany(Gallery::class, 'id_detail_sparepart');
    // }
}
