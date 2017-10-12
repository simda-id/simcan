<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefIndikator extends Model
{
    protected $table = 'ref_indikator';
    protected $primaryKey = 'id_indikator';

    public $timestamps = false;
}
