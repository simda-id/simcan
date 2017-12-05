<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpd extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_forum_skpd';
    protected $primaryKey = 'id_forum_skpd';

    public function idPelaksanaForumSkpd(){
      return $this->hasMany('trx_forum_skpd_pelaksana','id_forum_skpd');
    }
    public function idIndikatorForumSkpd(){
      return $this->hasMany('trx_forum_skpd_indikator','id_forum_skpd');
    }
}