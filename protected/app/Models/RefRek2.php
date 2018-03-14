<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refrek2 extends Model
{
    
    protected $table = 'ref_rek_2';
    // protected $primaryKey= 'kd_rek_1','kd_rek_2';
    protected $fillable = ['kd_rek_1','kd_rek_2','nama_kd_rek_2',];

    public $timestamps = false;

}
