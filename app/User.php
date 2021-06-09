<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tb_marketplace_user';
    
    protected $primaryKey = 'id_user';

    protected $fillable = [

        'nama_user', 'email', 'password', 'role', 'alamat_user', 'nohp_user', 'id_desa'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Desa(){
        return $this->hasOne(DesaBaru::class, 'id_desa', 'id_desa');
    }
}
