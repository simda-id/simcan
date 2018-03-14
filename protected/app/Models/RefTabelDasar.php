<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefTabelDasar extends Model
{
    protected $table = 'ref_tabel_dasar';
    protected $primaryKey = 'id_tabel_dasar';
    protected $fillable = ['id_tabel_dasar','nama_tabel'];

    public $timestamps = false;

    

}
