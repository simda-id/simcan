<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefDataSubUnit extends Model
{
    protected $table = 'ref_data_sub_unit';
    protected $primaryKey = 'id_rincian_unit';
    protected $fillable = ['tahun','id_rincian_unit', 'id_sub_unit', 'alamat_sub_unit', 'kota_sub_unit', 
			'nama_jabatan_pimpinan_skpd', 'nama_pimpinan_skpd', 'nip_pimpinan_skpd'];

    public $timestamps = false;


}
