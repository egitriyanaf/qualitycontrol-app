<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QCBahanKemas extends Model
{
    protected $table = 'tbl_qc_bahan_kemas';
    protected $primarykey = 'id';
    protected $fillable = [
    	'tanggal',
    	'area',
    	'jam_sample',
    	'jenis',
    	'supplier',
    	'no_po',
    	'jumlah',
    	'satuan',
    	'no_mobil',
    	'no_lot',
        'coa',
    	'status'
    ];
    public $timestamps = false;
}
