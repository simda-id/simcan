<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefUnit extends Model
{
    protected $table = 'ref_unit';
    protected $primaryKey = 'id_unit';
    // protected $relations = [];

    public $timestamps = false;

    public function bidang()
    {
        return $this->belongsTo('App\RefBidang', 'id_bidang');
    }
}
