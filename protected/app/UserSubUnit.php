<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubUnit extends Model
{
    protected $table = 'user_sub_unit';

    public $timestamps = false;

    public $fillable = [
    	'user_id',
    	'kd_unit',
        'kd_sub'
    ];

    public function getSubUnit() {
        return $this->hasOne('App\RefSubUnit', 'id_unit', 'kd_unit')->where('kd_sub', $this->kd_sub);
    }
}
