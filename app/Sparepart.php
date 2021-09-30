<?php

namespace App;

use App\Model\MasterData\Kemasan;
use App\Model\MasterData\Konversi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sparepart extends Model
{
    protected $table = "tb_inventory_master_sparepart";

    protected $primaryKey = 'id_sparepart';

    protected $fillable = [
        'kode_sparepart',
        'nama_sparepart',
        'id_merk',
        'id_jenis_sparepart',
        'id_konversi',
        'id_kemasan',
        'status_sparepart',
        'lifetime',
        'jenis_barang',
        'dimensi_berat',
        'slug'
    ];

 

    public function Merk(){
        return $this->belongsTo(SparepartMerk::class, 'id_merk', 'id_merk');
    }

    public function Category(){
        return $this->belongsTo(Category::class, 'id_jenis_sparepart', 'id_jenis_sparepart');
    }

    public function Konversi()
    {
        return $this->belongsTo(Konversi::class, 'id_konversi', 'id_konversi')->withTrashed();
    }

    public function Kemasan()
    {
        return $this->belongsTo(Kemasan::class, 'id_kemasan', 'id_kemasan')->withTrashed();
    }

    public static function getId()
    {
        $getId = DB::table('tb_inventory_master_sparepart')->orderBy('id_sparepart', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_sparepart' => 0
            ]
        ];
    }

   

}
