<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefTahun extends Model
{
    protected $table = 'ref_tahun';
    protected $fillable = ['id_tahun','id_pemda','id_rpjmd','tahun_0','tahun_1','tahun_2','tahun_3','tahun_4','tahun_5',];
    protected $primaryKey = 'id_tahun';

    public $timestamps = false;


}
