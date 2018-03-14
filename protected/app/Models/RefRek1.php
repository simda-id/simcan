<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refrek1 extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_rek_1';
    protected $primaryKey='kd_rek_1';
    protected $fillable = ['kd_rek_1','nama_kd_rek_1',];

    public $timestamps = false;



}
