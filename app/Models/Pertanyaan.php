<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pertanyaan
 */
class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    public $timestamps = true;

    protected $fillable = [
        'pertanyaan',
        'jenis_pertanyaan_id'
    ];

    protected $guarded = [];

    public function jenis_pertanyaan () {
    	return $this->belongsTo('App\Models\JenisPertanyaan');
    }

    public function hasil_evaluasi_dosen_has_pertanyaan(){

        return $this->hasMany('App\Models\HasilEvaluasiDosenHasPertanyaan') ;
    }

        
}