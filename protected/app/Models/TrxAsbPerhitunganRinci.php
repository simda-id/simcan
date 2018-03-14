<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbPerhitunganRinci extends Model
{
    protected $table = 'trx_perhitungan_komponen_rinci';
    protected $fillable = ['id_perhitungan_rinci','id_perhitungan','id_asb_kelompok','id_asb_sub_kelompok','id_asb_sub_sub_kelompok','id_aktivitas_asb','id_komponen_asb','id_komponen_asb_rinci','id_tarif_ssh','harga_satuan','jml_pagu',];
    protected $primaryKey = 'id_perhitungan_rinci';

    public $timestamps = false;

    public function trxasbperhitungan()
    {
      return $this->belongsTo('App\Models\TrxAsbPerhitungan', 'id_perhitungan');
    }

}
