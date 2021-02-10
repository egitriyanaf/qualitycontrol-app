<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QCBahanKemasDetail extends Model
{
    protected $table = 'tbl_qc_bahan_kemas_detail';
    protected $primarykey = 'id';
    protected $fillable = [
    	'nama_produk',
    	'netto',
    	'komposisi',
    	'alamat_produsen',
    	'label_halal',
    	'barcode',
    	'bau',
    	'warna',
    	'printing',
    	'delaminasi',
    	'seal',
    	'creasing',
    	'kondisi_core',
    	'cut_off',
    	'kondisi_mobil',
    	'jumlah_karton',
    	'tinggi_fluts_karton',
    	'panjang_karton',
    	'lebar_karton',
    	'tinggi_karton',
    	'berat_roll',
    	'core_roll',
    	'panjang_roll',
    	'lebar_roll',
    	'tebal_roll',
    	'jumlah_bag',
    	'gaset_bag',
    	'lebar_bag',
    	'tinggi_bag',
    	'ketebalan_inner_bag',
    	'berat_plastik',
    	'ketebalan_plastik',
    	'gaset_plastik',
    	'lebar_plastik',
    	'tinggi_plastik',
    	'kode_bahan_kemas'
    ];
    public $timestamps = false;
}
