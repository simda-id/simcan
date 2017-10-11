<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefSetting extends Model
{
    protected $table = 'ref_setting';
    protected $fillable = [
				'tahun_rencana',
				'jenis_rw',
				'jml_rw',
				'pagu_rw',
				'jenis_desa',
				'jml_desa',
				'pagu_desa',
				'jenis_kecamatan',
				'jml_kecamatan',
				'pagu_kecamatan',
				'status_setting'];
    protected $primaryKey = 'tahun_rencana';
    // protected $relations = [];

    public $timestamps = false;

    public static function thnAktif()
    {
      return static ::where('status_setting','=','1');
    }
}
