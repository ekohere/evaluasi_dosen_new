<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\JenisPertanyaan;
use Illuminate\Http\Request;
use Session;

class JenisPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $jenis_pertanyaan = JenisPertanyaan::where('nama','like','%'.(isset($request->search)?$request->search:'').'%')->paginate(isset($request->pagination)?$request->pagination:25);
        $title='Tabel JenisPertanyaan';
        return view('admin.jenis_pertanyaan.index', compact('jenis_pertanyaan','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    $title='Tambah Data JenisPertanyaan';
        return view('admin.jenis_pertanyaan.create',compact('title'));
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
        
        JenisPertanyaan::create($requestData);

        Session::flash('flash_message', 'JenisPertanyaan added!');

        return redirect('admin/jenis_pertanyaan');
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
        $jenis_pertanyaan = JenisPertanyaan::findOrFail($id);
        $title='JenisPertanyaan '.$jenis_pertanyaan->nama;
        return view('admin.jenis_pertanyaan.show', compact('jenis_pertanyaan','title'));
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
        $jenis_pertanyaan = JenisPertanyaan::findOrFail($id);
        $title='Ubah JenisPertanyaan '.$jenis_pertanyaan->nama;
        return view('admin.jenis_pertanyaan.edit', compact('jenis_pertanyaan','title'));
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
        
        $jenis_pertanyaan = JenisPertanyaan::findOrFail($id);
        $jenis_pertanyaan->update($requestData);

        Session::flash('flash_message', 'JenisPertanyaan updated!');

        return redirect('admin/jenis_pertanyaan');
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
        JenisPertanyaan::destroy($id);

        Session::flash('flash_message', 'JenisPertanyaan deleted!');

        return redirect('admin/jenis_pertanyaan');
    }
}
