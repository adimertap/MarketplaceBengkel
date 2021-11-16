<?php

namespace App\Model\MasterData;

use App\Model\MasterData\Kendaraan;
use Illuminate\Database\Eloquent\Model;

class Detailkendaraan extends Model
{
    protected $table = "tb_fo_detail_kendaraan";

    protected $primaryKey = 'id_detail_kendaraan';

    protected $fillable = [
        'id_bengkel',
        'id_kendaraan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id_kendaraan');
    }

}