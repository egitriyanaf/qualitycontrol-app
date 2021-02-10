<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QCBarangJadi extends Model
{
    protected $table = 'tbl_qc_barang_jadi';
    protected $primarykey = 'id';
    protected $fillable = [
    	'tanggal',
    	'kendaraan'
   	];
    public $timestamps = false;
}
