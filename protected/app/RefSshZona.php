<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefSshZona extends Model
{
    protected $table = 'ref_ssh_zona';
    protected $primaryKey = 'id_zona';
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
