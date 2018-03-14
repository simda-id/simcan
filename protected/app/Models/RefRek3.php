<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refrek3 extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_rek_3';
    // protected $primaryKey= 'kd_rek_1','kd_rek_2','kd_rek_3';
    protected $fillable = ['kd_rek_1','kd_rek_2','kd_rek_3','nama_kd_rek_3',];

    public $timestamps = false;

}
