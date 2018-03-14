<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxIsianDataDasar extends Model
{
    protected $table = 'trx_isian_data_dasar';
    protected $primaryKey = 'id_isian_tabel_dasar';
    protected $fillable = ['id_isian_tabel_dasar',
        'id_kolom_tabel_dasar',
        'id_kecamatan',
        'nmin1',
        'nmin2',
        'nmin3',
        'nmin4',
        'nmin5',
        'tahun',
        'nmin1_persen',
        'nmin2_persen',
        'nmin3_persen',
        'nmin4_persen',
        'nmin5_persen'
    ];

    public $timestamps = false;

    public function ref_isian_tabel_dasar()
    {
      return $this->belongsTo('App\Models\RefKolomTabelDasar','id_kolom_tabel_dasar');
    }

}
