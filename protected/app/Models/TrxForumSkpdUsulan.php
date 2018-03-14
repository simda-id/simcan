<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpdUsulan extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_forum_skpd_usulan';
    protected $primaryKey = 'id_sumber_usulan';
    protected $fillable = [
				'id_sumber_usulan',
				'id_lokasi_forum',
				'id_ref_usulan',
				'sumber_usulan',
				'volume_1_usulan',
				'volume_2_usulan',
				'volume_1_forum',
				'volume_2_forum',
				'status_data',
				'ket_usulan',
				'uraian_usulan',
				];


}