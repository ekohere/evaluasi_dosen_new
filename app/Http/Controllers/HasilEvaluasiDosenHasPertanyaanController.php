<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HasilEvaluasiDosenHasPertanyaan;
use Illuminate\Http\Request;
use Session;

class HasilEvaluasiDosenHasPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $hasil_evaluasi_dosen_has_pertanyaan = HasilEvaluasiDosenHasPertanyaan::where('hasil_evaluasi_dosen_id','like','%'.(isset($request->search)?$request->search:'').'%')->paginate(isset($request->pagination)?$request->pagination:25);
        $title='Tabel HasilEvaluasiDosenHasPertanyaan';
        return view('admin.hasil_evaluasi_dosen_has_pertanyaan.index', compact('hasil_evaluasi_dosen_has_pertanyaan','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    $title='Tambah Data HasilEvaluasiDosenHasPertanyaan';
        return view('admin.hasil_evaluasi_dosen_has_pertanyaan.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        HasilEvaluasiDosenHasPertanyaan::create($requestData);

        Session::flash('flash_message', 'HasilEvaluasiDosenHasPertanyaan added!');

        return redirect('admin/hasil_evaluasi_dosen_has_pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $hasil_evaluasi_dosen_has_pertanyaan = HasilEvaluasiDosenHasPertanyaan::findOrFail($id);
        $title='HasilEvaluasiDosenHasPertanyaan '.$hasil_evaluasi_dosen_has_pertanyaan->nama;
        return view('admin.hasil_evaluasi_dosen_has_pertanyaan.show', compact('hasil_evaluasi_dosen_has_pertanyaan','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $hasil_evaluasi_dosen_has_pertanyaan = HasilEvaluasiDosenHasPertanyaan::findOrFail($id);
        $title='Ubah HasilEvaluasiDosenHasPertanyaan '.$hasil_evaluasi_dosen_has_pertanyaan->nama;
        return view('admin.hasil_evaluasi_dosen_has_pertanyaan.edit', compact('hasil_evaluasi_dosen_has_pertanyaan','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $hasil_evaluasi_dosen_has_pertanyaan = HasilEvaluasiDosenHasPertanyaan::findOrFail($id);
        $hasil_evaluasi_dosen_has_pertanyaan->update($requestData);

        Session::flash('flash_message', 'HasilEvaluasiDosenHasPertanyaan updated!');

        return redirect('admin/hasil_evaluasi_dosen_has_pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        HasilEvaluasiDosenHasPertanyaan::destroy($id);

        Session::flash('flash_message', 'HasilEvaluasiDosenHasPertanyaan deleted!');

        return redirect('admin/hasil_evaluasi_dosen_has_pertanyaan');
    }
}
