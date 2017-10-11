<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefGroup extends Model
{
    protected $table = 'ref_group';
    protected $primaryKey = 'id';
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
