<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QCBarangJadiDetail extends Model
{
    protected $table = 'tbl_qc_barang_jadi_detail';
    protected $primarykey = 'id';
    protected $fillable = [
    	'no_do',
    	'mulai',
    	'selesai',
    	'tujuan',
    	'no_polisi',
    	'bersih',
    	'suku_cadang',
    	'bau',
    	'bocor',
    	'basah',
    	'identitas_produk',
    	'no_lot',
    	'kondisi_jahitan',
    	'paper_zak',
    	'karton',
    	'status',
    	'verifikasi',
    	'keterangan',
    	'kode_qc_barang_jadi'
   	];
    public $timestamps = false;
}
