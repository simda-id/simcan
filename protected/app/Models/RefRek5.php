<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefRek5 extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_rek_5';
    protected $primaryKey='id_rekening';
    protected $fillable = ['id_rekening','kd_rek_1','kd_rek_2','kd_rek_3','kd_rek_4','kd_rek_5','nama_kd_rek_5',];

    public $timestamps = false;

}
