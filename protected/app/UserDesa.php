<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDesa extends Model
{
    protected $table = 'user_desa';

    public $timestamps = false;

    public $fillable = ['id_user_wil',
    	'user_id',
    	'kd_kecamatan',
        'kd_desa'
    ];

    public function getKecamatan() {
        return $this->hasOne('App\RefKecamatan', 'id_kecamatan', 'kd_kecamatan');
    }    

    public function getDesa() {
        return $this->hasOne('App\RefDesa', 'id_kecamatan', 'kd_kecamatan')->where('kd_desa', $this->kd_desa);
    }
}
