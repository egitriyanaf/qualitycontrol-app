<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProsesProduksiInformasiLain extends Model
{
    protected $table = 'tbl_pp_informasi_lain';
    protected $primarykey = 'id';
    protected $fillable = [
    	'jam',
    	'bahan_baku',
    	'no_lot',
    	'kadar_air_tepung',
    	'bulk',
    	'air',
    	'kode_proses_produksi'
    ];
    public $timestamps = false;
}
