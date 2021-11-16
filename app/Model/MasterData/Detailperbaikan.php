<?php

namespace App\Model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Detailperbaikan extends Model
{

    protected $table = "tb_fo_detail_jenis_perbaikan";

    protected $primaryKey = 'id_detail_perbaikan';

    protected $fillable = [
        'id_bengkel',
        'id_jenis_perbaikan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Jenis_Perbaikan()
    {
        return $this->belongsTo(JenisPerbaikan::class, 'id_jenis_perbaikan', 'id_jenis_perbaikan');
    }
}