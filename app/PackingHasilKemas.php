<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingHasilKemas extends Model
{
    protected $table = 'tbl_p_hasil_kemas';
    protected $primarykey = 'id';
    protected $fillable = [
    	'no_lot',
    	'exp_date',
    	'kode_packing'
    ];
    public $timestamps = false;
}
