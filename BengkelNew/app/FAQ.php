<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = "tb_fo_master_faq";

    protected $primaryKey = 'id_fo_faq';

    protected $fillable = [
        'pertanyaan_faq', 'jawaban_faq', 'id_bengkel', 'id_user', 'tanggal_jawaban'];

    public function Bengkel(){
        return $this->belongsTo(Bengkel::class, 'id_bengkel', 'id_bengkel');
    }
    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
