<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanPacking extends Model
{
    protected $table = 'tbl_pemeriksaan_packing';
    protected $primarykey = 'id';
    protected $fillable = [
    	'nama_produk',
    	'tanggal_produksi',
    	'mesin',
    	'no_so',
    	'no_md',
    	'setting_md',
    	'hopper_mesin_kemas',
    	'mesin_kemas',
    	'karton_sealer'
    ];
    public $timestamps = false;
}
