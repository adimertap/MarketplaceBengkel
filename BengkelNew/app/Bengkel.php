<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    protected $table ='tb_marketplace_bengkel';
    protected $primaryKey = 'id_bengkel';

    public $timestamps = false;
  }
