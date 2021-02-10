<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackingHasilKartonDetail extends Model
{
    protected $table = 'tbl_p_hasil_karton_detail';
    protected $primarykey = 'id';
    protected $fillable = [
    	'jam',
    	'berat',
    	'kodefikasi',
    	'visual_karton',
    	'id_hasil_karton'
    ];
    public $timestamps = false;
}
