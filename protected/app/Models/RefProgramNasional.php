<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefProgramNasional extends Model
{
    protected $table = 'ref_program_nasional';
    protected $primaryKey = 'id_program_nasional';
    protected $fillable = ['id_prioritas', 'id_program_nasional', 'uraian_program_nasional'];

    public $timestamps = false;
}
