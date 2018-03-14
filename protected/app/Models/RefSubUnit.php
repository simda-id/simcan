<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefSubUnit extends Model
{
    protected $table = 'ref_sub_unit';
    protected $primaryKey = 'id_sub_unit';
    protected $fillable = ['id_sub_unit', 'id_unit', 'kd_sub', 'nm_sub'];

    public $timestamps = false;


}
