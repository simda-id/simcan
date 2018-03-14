<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefLogAkses extends Model
{
    protected $table = 'ref_log_akses';
    protected $primaryKey = 'id_log';
    public $fillable = ['id_log','fl1','fd1','fp2','fu3','fr4',];
    // protected $relations = [];

    public $timestamps = false;
}
