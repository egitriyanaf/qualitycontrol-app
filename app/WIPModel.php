<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WIPModel extends Model
{
    protected $table = 'tbl_p_wip';
    protected $primarykey = 'id';
    protected $fillable = [
    	'jam',
    	'warna',
    	'bentuk',
    	'kode_packing',
    ];
    public $timestamps = false;
}
