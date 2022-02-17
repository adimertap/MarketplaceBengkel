<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = "tb_marketplace_keuangan";

    protected $primaryKey = 'id_keuangan';
    protected $fillable = [
       'id_bengkel', 'jumlah', 'status', 'keterangan', 'id_bank_account', 'photo'];

       public function Bengkel(){
        return $this->belongsTo(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }
    public function Bank(){
        return $this->belongsTo(Bankaccount::class, 'id_bank_account', 'id_bank_account');
    }

}
