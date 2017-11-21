<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubUnit extends Model
{
    protected $table = 'user_sub_unit';
    protected $primaryKey = 'id_user_unit';

    public $timestamps = false;

    public $fillable = ['id_user_unit',
    	'user_id',
    	'kd_unit',
        'kd_sub'
    ];

    public function getSubUnit() {
        return $this->hasOne('App\RefSubUnit', 'id_unit', 'kd_unit')->where('kd_sub', $this->kd_sub);
    }
}
