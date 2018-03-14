<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefProgram extends Model
{
    protected $table = 'ref_program';
    protected $primaryKey = 'id_program';
    protected $fillable = ['id_bidang','id_program','kd_program','uraian_program'];

    public $timestamps = false;

    public function ref_kegiatan()
    {
      return $this->hasMany('App\Models\RefKegiatan','id_program');
    }

    public function ref_bidang()
    {
      return $this->belongsTo('App\Models\RefBidang','id_bidang');
    }
}
