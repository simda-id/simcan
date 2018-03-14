<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefLokasi extends Model
{
    protected $table = 'ref_lokasi';
    protected $primaryKey = 'id_lokasi';
    protected $fillable = ['id_lokasi',
				'jenis_lokasi',
				'nama_lokasi',
				'id_desa',
				'id_desa_awal',
				'id_desa_akhir',
				'koordinat_1',
				'koordinat_2',
				'koordinat_3',
				'koordinat_4',
				'luasan_kawasan',
				'satuan_luas',
				'panjang',
				'satuan_panjang',
				'lebar',
				'satuan_lebar',
				'keterangan_lokasi'];

    public $timestamps = false;
}
