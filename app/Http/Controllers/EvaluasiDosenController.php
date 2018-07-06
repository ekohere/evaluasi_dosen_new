<?php

namespace App\Http\Controllers;

use App\Models\HasilEvaluasiDosen;
use App\Models\HasilEvaluasiDosenHasPertanyaan;
use App\Models\JenisPertanyaan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class EvaluasiDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $jenis_pertanyaan=JenisPertanyaan::orderBy('order')->get();
        $sidebar_left_collapsed=true;
        return view('Input.evaluasi_dosen',compact('jenis_pertanyaan','sidebar_left_collapsed'));
    }

    public function store(Request $request)
    {
        $requestData =$request->all();

        try {
            DB::beginTransaction();

            $hasil_evaluasi_dosen=HasilEvaluasiDosen::create($requestData);

            foreach($requestData['hasil'] as $key=> $item){
                HasilEvaluasiDosenHasPertanyaan::create([
                    'hasil_evaluasi_dosen_id'=>$hasil_evaluasi_dosen->id,
                    'pertanyaan_id'=>$key,
                    'hasil'=>$item
                ]);

            }

            DB::commit();

            Session::flash('flash_message', 'Biodata added!');
        }catch(Exception $e){
            DB::rollback();
        }

        return redirect('/home');
    }

    public function getPertanyaan(){
        return JenisPertanyaan::with(['listPertanyaan'])->orderBy('order')->get();
    }
}
