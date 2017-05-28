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
        'singkatan',
        'order'
    ];

    protected $guarded = [];

     public function listPertanyaan(){

        return $this->hasMany('App\Models\Pertanyaan') ;
    }

    public function getNamaLengkapAttribute(){

        return $this->nama.' ('.$this->singkatan.')' ;
    }
        
}