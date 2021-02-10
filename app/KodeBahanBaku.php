<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeBahanBaku extends Model
{
    protected $table = 'tbl_kode_bahan_baku';
    protected $primarykey = 'id';
    protected $fillable = ['nama'];
    public $timestamps = false;
}
