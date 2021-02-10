<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CekBahanBakuDetail extends Model
{
    protected $table = 'tbl_cek_bahan_baku_detail';
    protected $primarykey = 'id';
    protected $fillable = [
    	'sanitasi_produk',
    	'jenis_kemasan',
    	'berat',
    	'coa',
    	'label',
    	'sertifikasi',
    	'satus',
    	'tekstur',
    	'aroma',
    	'warna',
    	'cemaran_fisik',
    	'particle_size',
    	'mc',
    	'ph',
    	'kelarutan',
    	'aroma_b',
    	'warna_b',
    	'rasa',
    	'no_mobil',
    	'no_container',
    	'kondisi_mobil',
    	'keterangan',
    	'kode_cek_bahan_baku'
    ];
    public $timestamps = false;
}
