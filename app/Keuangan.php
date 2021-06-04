<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
     protected $table = "tb_marketplace_keuangan";

    protected $primaryKey = 'id_keuangan';
    protected $fillable = [
       'id_bengkel', 'jumlah', 'status', 'keterangan'];

       public function Bengkel(){
        return $this->belongsTo(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }
}
