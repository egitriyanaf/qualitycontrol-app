<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangJadi extends Model
{
    protected $table = 'tbl_barang_jadi';
    protected $primarykey = 'id';
    protected $fillable = ['kode','nama'];
    public $timestamps = false;
}
