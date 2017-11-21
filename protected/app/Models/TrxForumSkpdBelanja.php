<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpdBelanja extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_forum_skpd_belanja';
    protected $primaryKey = 'id_belanja_forum';
    protected $fillable = ['tahun_forum', 'no_urut', 'id_belanja_forum', 'id_lokasi_forum', 'id_zona_ssh', 'id_belanja_renja', 'sumber_belanja', 'id_aktivitas_asb', 'id_item_ssh', 'id_rekening_ssh', 'uraian_belanja', 'volume_1', 'id_satuan_1', 'volume_2', 'id_satuan_2', 'harga_satuan', 'jml_belanja', 'volume_1_forum', 'id_satuan_1_forum', 'volume_2_forum', 'id_satuan_2_forum', 'harga_satuan_forum', 'jml_belanja_forum', 'status_data', 'sumber_data'
				];


}