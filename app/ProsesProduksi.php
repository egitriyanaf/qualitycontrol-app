<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProsesProduksi extends Model
{
    protected $table = 'tbl_proses_produksi';
    protected $primarykey = 'id';
    protected $fillable = [
    	'nama_produk',
    	'tanggal_produksi',
    	'shift',
    	'no_mesin',
    	'no_microwave',
    	'no_lot',
        'lolos',
        'blending',
        'p_',
        'scrap',
        'informasi_lain'
    ];
    public $timestamps = false;
}
