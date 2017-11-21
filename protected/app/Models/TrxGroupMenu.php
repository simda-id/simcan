<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxGroupMenu extends Model
{
    protected $table = 'ref_menu';
    protected $primaryKey = 'id_menu';
    public $fillable = ['id_menu','group_id','menu','akses',];
    // protected $relations = [];

    public $timestamps = false;
}
