<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingBahanKemas extends Model
{
    protected $table = 'tbl_p_bahan_kemas';
    protected $primarykey = 'id';
    protected $fillable = [
    	'supplier',
    	'lot',
    	'warna',
    	'delaminasi',
    	'jumlah',
    	'kode_packing'
    ];
    public $timestamps = false;
}
