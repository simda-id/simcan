<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancanganBelanja extends Model
{
    protected $table = 'trx_renja_rancangan_belanja';
    protected $primaryKey = 'id_belanja_renja';
    // protected $relations = [];

    public $timestamps = false;

    public $fillable = [
    'tahun_renja ',
    'no_urut ',
    'id_belanja_renja ',
    'id_lokasi_renja ',
    'sumber_aktivitas ',
    'id_aktivitas_asb ',
    'id_tarif_ssh ',
    'id_rekening_ssh ',
    'uraian_belanja ',
    'volume_1 ',
    'id_satuan_1 ',
    'volume_2 ',
    'id_satuan_2 ',
    'harga_satuan ',
    'jml_belanja ',
    'status_data',];
}
