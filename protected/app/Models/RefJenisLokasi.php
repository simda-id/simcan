<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefJenisLokasi extends Model
{
    protected $table = 'ref_jenis_lokasi';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['id_jenis', 'nm_jenis'];

    public $timestamps = false;
}
