<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefBidang extends Model
{
    protected $table = 'ref_bidang';
    protected $primaryKey = 'id_bidang';
    protected $fillable = ['id_bidang','kd_urusan','kd_bidang','nm_bidang','kd_fungsi'];

    public $timestamps = false;

    public function ref_urusan()
    {
      return $this->belongsTo('App\Models\RefUrusan','kd_urusan');
    }

    public function ref_program()
    {
      return $this->hasMany('App\Models\RefProgram','id_bidang');
    }

    public function trx_rpjmd_program_urusan()
    {
      return $this->hasMany('App\Models\TrxRpjmdProgramUrusan','id_bidang');
    }
}
