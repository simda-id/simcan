<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefKolomTabelDasar extends Model
{
    protected $table = 'ref_kolom_tabel_dasar';
    protected $primaryKey = 'id_kolom_tabel_dasar';
    protected $fillable = ['id_kolom_tabel_dasar',
        'id_tabel_dasar',
        'nama_kolom',
        'level',
        'parent_id'
    ];

    public $timestamps = false;

    public function ref_kolom_tabel_dasar()
    {
      return $this->belongsTo('App\Models\RefTabelDasar','id_tabel_dasar');
    }

}
