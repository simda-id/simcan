<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefUnit extends Model
{
    protected $table = 'ref_unit';
    protected $primaryKey = 'id_unit';
    protected $fillable = ['id_unit','id_bidang','kd_unit','nm_unit'];

    public $timestamps = false;

    public function ref_bidang()
    {
      return $this->belongsTo('App\Models\RefBidang','id_bidang');
    }

    public function trx_rpjmd_program_pelaksana()
    {
      return $this->hasMany('App\Models\TrxRpjmdProgramPelaksana','id_unit');
    }

    public function trx_renstra_visi()
    {
      return $this->hasMany('App\Models\TrxRenstraVisi','id_unit');
    }

}
