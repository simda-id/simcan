<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRpjmdDokumen extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_rpjmd_dokumen';
    protected $primaryKey = 'id_rpjmd';


}
