<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefSubUnit extends Model
{
    protected $table = 'ref_sub_unit';
    protected $primaryKey = 'id_sub_unit';
    // protected $relations = [];

    public $timestamps = false;

    public function unit()
    {
        return $this->belongsTo('App\RefUnit', 'id_unit');
    }
}
