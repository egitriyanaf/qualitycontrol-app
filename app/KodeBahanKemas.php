<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeBahanKemas extends Model
{
    protected $table = 'tbl_kode_bahan_kemas';
    protected $primarykey = 'id';
    protected $fillable = ['nama'];
    public $timestamps = false;
}
