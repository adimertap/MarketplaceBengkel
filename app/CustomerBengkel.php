<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBengkel extends Model
{
    protected $table = "tb_fo_customer_bengkel";

    protected $primaryKey = 'id_customer_bengkel';

    protected $fillable = [
        'nama_customer', 'email_customer', 'nohp_customer', 'alamat_customer', 'id_bengkel', 'id_user'
    ];

   
}
