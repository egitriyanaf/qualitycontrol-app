<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingHasilKemasDetail extends Model
{
    protected $table = 'tbl_p_hasil_kemas_detail';
    protected $primarykey = 'id';
    protected $fillable = [
    	'jam',
    	'berat',
    	'kemasan',
    	'seal',
    	'kodefikasi',
    	'kebocoran',
    	'metal_detector',
    	'id_hasil_kemas'
    ];
    public $timestamps = false;
}
