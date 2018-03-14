<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefKegiatan extends Model
{
    protected $table = 'ref_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = ['id_kegiatan','id_program','kd_kegiatan','nm_kegiatan'];

    public $timestamps = false;

    public function ref_program()
    {
      return $this->belongsTo('App\Models\RefProgram','id_program');
    }

}
