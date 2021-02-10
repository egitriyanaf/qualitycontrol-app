<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProsesProduksiDetail extends Model
{
	protected $table = 'tbl_pp_detail';
    protected $primarykey = 'id';
    protected $fillable = [
    	'jam_ambil_sample',
    	'kadar_air',
    	'berat_sample',
    	'bd',
    	'volume_kering',
    	'volume_basah',
    	'berat_kering',
    	'berat_basah',
    	'berat_kemasan',
    	'tidak_ada_cemaran',
    	'kenyal',
    	'serat',
    	'aroma',
    	'rasa',
    	'bentuk',
    	'warna',
    	'test_apung',
    	'bubuk',
    	'percent',
    	'status',
    	'kode_proses_produksi'
    ];
    public $timestamps = false;
}
