<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisPertanyaan
 */
class JenisPertanyaan extends Model
{
    protected $table = 'jenis_pertanyaan';

    public $timestamps = true;

    protected $fillable = [
        'nama',
        'singkatan'
    ];

    protected $guarded = [];

     public function pertanyaan(){

        return $this->hasMany('App\Pertanyaan') ;
    }
    
        
}