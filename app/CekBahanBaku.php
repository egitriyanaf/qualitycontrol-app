<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CekBahanBaku extends Model
{
 	protected $table = 'tbl_cek_bahan_baku';
    protected $primarykey = 'id';
    protected $fillable = [
    	'tanggal_datang',
    	'area',
    	'jam_sample',
    	'jenis',
    	'merk',
    	'produsen',
    	'negara_asal',
    	'pemasok',
    	'no_po',
    	'jumlah',
    	'satuan',
    	'no_lot',
    	'exp_date',
    	'kode_cek_bahan_baku'
    ];
    public $timestamps = false;   
}
