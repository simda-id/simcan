<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refrek4 extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_rek_4';
    protected $primaryKey=['kd_rek_1','kd_rek_2','kd_rek_3','kd_rek_4'];
    protected $fillable = ['kd_rek_1','kd_rek_2','kd_rek_3','kd_rek_4','nama_kd_rek_4',];

    public $timestamps = false;

}
