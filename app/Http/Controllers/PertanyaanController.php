<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Session;

class PertanyaanController extends Controller
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
            $pertanyaan = Pertanyaan::paginate($perPage);
        } else {
            $pertanyaan = Pertanyaan::paginate($perPage);
        }

        return view('admin.pertanyaan.index', compact('pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pertanyaan.create');
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
        
        Pertanyaan::create($requestData);

        Session::flash('flash_message', 'Pertanyaan added!');

        return redirect('admin/pertanyaan');
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
        $pertanyaan = Pertanyaan::findOrFail($id);

        return view('admin.pertanyaan.show', compact('pertanyaan'));
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
        $pertanyaan = Pertanyaan::findOrFail($id);

        return view('admin.pertanyaan.edit', compact('pertanyaan'));
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
        
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update($requestData);

        Session::flash('flash_message', 'Pertanyaan updated!');

        return redirect('admin/pertanyaan');
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
        Pertanyaan::destroy($id);

        Session::flash('flash_message', 'Pertanyaan deleted!');

        return redirect('admin/pertanyaan');
    }
}
