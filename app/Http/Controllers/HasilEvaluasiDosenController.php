<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HasilEvaluasiDosen;
use Illuminate\Http\Request;
use Session;

class HasilEvaluasiDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $hasil_evaluasi_dosen = HasilEvaluasiDosen::where('nama_dosen','like','%'.(isset($request->search)?$request->search:'').'%')->paginate(isset($request->pagination)?$request->pagination:25);
        $title='Tabel HasilEvaluasiDosen';
        return view('admin.hasil_evaluasi_dosen.index', compact('hasil_evaluasi_dosen','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    $title='Tambah Data HasilEvaluasiDosen';
        return view('admin.hasil_evaluasi_dosen.create',compact('title'));
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
        
        HasilEvaluasiDosen::create($requestData);

        Session::flash('flash_message', 'HasilEvaluasiDosen added!');

        return redirect('admin/hasil_evaluasi_dosen');
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
        $hasil_evaluasi_dosen = HasilEvaluasiDosen::findOrFail($id);
        $title='HasilEvaluasiDosen '.$hasil_evaluasi_dosen->nama;
        return view('admin.hasil_evaluasi_dosen.show', compact('hasil_evaluasi_dosen','title'));
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
        $hasil_evaluasi_dosen = HasilEvaluasiDosen::findOrFail($id);
        $title='Ubah HasilEvaluasiDosen '.$hasil_evaluasi_dosen->nama;
        return view('admin.hasil_evaluasi_dosen.edit', compact('hasil_evaluasi_dosen','title'));
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
        
        $hasil_evaluasi_dosen = HasilEvaluasiDosen::findOrFail($id);
        $hasil_evaluasi_dosen->update($requestData);

        Session::flash('flash_message', 'HasilEvaluasiDosen updated!');

        return redirect('admin/hasil_evaluasi_dosen');
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
        HasilEvaluasiDosen::destroy($id);

        Session::flash('flash_message', 'HasilEvaluasiDosen deleted!');

        return redirect('admin/hasil_evaluasi_dosen');
    }
}
