<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HasilEvaluasiDosenHasPertanyaan
 */
class HasilEvaluasiDosenHasPertanyaan extends Model
{
    protected $table = 'hasil_evaluasi_dosen_has_pertanyaan';

    public $timestamps = true;

    protected $fillable = [
        'hasil_evaluasi_dosen_id',
        'pertanyaan_id',
        'hasil'
    ];

    protected $guarded = [];

    public function pertanyaan () {
    	return $this->belongsTo('App\Models\Pertanyaan');
    }

    public function hasil_evaluasi_dosen () {
    	return $this->belongsTo('App\Models\HasilEvaluasiDosen');
    }
        
}