<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefProgramProvinsi extends Model
{
    protected $table = 'ref_program_provinsi';
    protected $primaryKey = 'id_program_provinsi';
    protected $fillable = ['id_prioritas', 'id_program_provinsi', 'uraian_program_provinsi'];

    public $timestamps = false;
}
