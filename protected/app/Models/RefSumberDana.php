<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefSumberDana extends Model
{
    protected $table = 'ref_sumber_dana';
    protected $primaryKey = 'id_sumber_dana';
    protected $fillable = ['id_sumber_dana', 'uraian_sumber_dana'];

    public $timestamps = false;
}
