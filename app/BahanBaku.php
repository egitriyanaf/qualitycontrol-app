<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'tbl_bahan_baku';
    protected $primarykey = 'id';
    protected $fillable = ['kode','nama'];
    public $timestamps = false;
}
