<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefSatuan extends Model
{
    protected $table = 'ref_satuan';
    protected $fillable = ['id_satuan','uraian_satuan','singkatan_satuan','scope_pemakaian'];
    protected $primaryKey = 'id_satuan';
    // protected $relations = [];

    public $timestamps = false;

    public function trxasbaktivitas()
    {
      return $this->hasMany('App\Models\TrxAsbAktivitas','satuan_aktivitas', 'id_satuan');
    }
}
