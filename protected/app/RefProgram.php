<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefProgram extends Model
{
    protected $table = 'ref_program';
    protected $primaryKey = 'id_program';
    public $timestamps = false;
    
    public function bidang()
    {
        return $this->belongsTo('App\RefBidang', 'id_bidang');
    }    
}
