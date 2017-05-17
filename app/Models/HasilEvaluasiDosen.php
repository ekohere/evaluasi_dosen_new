<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HasilEvaluasiDosen
 */
class HasilEvaluasiDosen extends Model
{
    protected $table = 'hasil_evaluasi_dosen';

    public $timestamps = true;

    protected $fillable = [
        'dosen_id',
        'nama_dosen',
        'nama_lengkap_dosen',
        'mata_kuliah_id',
        'nama_mata_kuliah',
        'tahun',
        'semester',
        'mahasiswa_id',
        'nama_mahasiswa',
        'nim_mahasiswa',
        'kelas_id',
        'nama_kelas',
        'program_studi',
        'jurusan',
        'komentar'
    ];

    protected $guarded = [];

        public function hasil_evaluasi_dosen_has_pertanyaan(){

        return $this->hasMany('App\HasilEvaluasiDosenHasPertanyaan') ;
    }
}