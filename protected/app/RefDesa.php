<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefDesa extends Model
{
    protected $table = 'ref_Desa';
    protected $primaryKey = 'id_desa';
    // protected $relations = [];

    public $timestamps = false;

    public function zonaSsh(){
        return $this->belongsTo('App\RefSshZona', 'id_zona');
    }
}
