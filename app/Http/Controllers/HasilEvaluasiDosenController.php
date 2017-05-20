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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $hasil_evaluasi_dosen = HasilEvaluasiDosen::paginate($perPage);
        } else {
            $hasil_evaluasi_dosen = HasilEvaluasiDosen::paginate($perPage);
        }

        return view('admin.hasil_evaluasi_dosen.index', compact('hasil_evaluasi_dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.hasil_evaluasi_dosen.create');
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

        return view('admin.hasil_evaluasi_dosen.show', compact('hasil_evaluasi_dosen'));
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

        return view('admin.hasil_evaluasi_dosen.edit', compact('hasil_evaluasi_dosen'));
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
