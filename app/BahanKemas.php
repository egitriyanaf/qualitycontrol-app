<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanKemas extends Model
{
    protected $table = 'tbl_bahan_kemas';
    protected $primarykey = 'id';
    protected $fillable = ['kode','nama'];
    public $timestamps = false;
}
