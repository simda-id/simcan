<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefUrusan extends Model
{
    protected $table = 'ref_urusan';
    protected $primaryKey = 'kd_urusan';
    protected $fillable = ['kd_urusan','nm_urusan'];

    public $timestamps = false;

    public function ref_bidang()
    {
      return $this->hasMany('App\Models\RefBidang','kd_urusan');
    }
}
