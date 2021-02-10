<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingHasilKarton extends Model
{
    protected $table = 'tbl_p_hasil_karton';
    protected $primarykey = 'id';
    protected $fillable = [
    	'no_lot',
    	'kode_packing'
    ];
    public $timestamps = false;
}
