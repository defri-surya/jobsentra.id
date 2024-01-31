<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Katagori_pekerjaan;
use Illuminate\Http\Request;

class DataKatagoripekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Katagori_pekerjaan::all();

        return view('Admin.Datakatagoripekerjaan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Datakatagoripekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bidang_pekerjaan'  => 'required',
        ]);

        $data = $request->all();

        Katagori_pekerjaan::create($data);
        return redirect()->route('datakatagoripekerjaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Katagori_pekerjaan::findOrFail($id);

        return view('Admin.Datakatagoripekerjaan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bidang_pekerjaan' => 'required',
        ]);

        $data = $request->all();
        $katagori = Katagori_pekerjaan::findorfail($id);
        $katagori->update($data);

        return redirect()->route('datakatagoripekerjaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Katagori_pekerjaan::where('id', $id)->delete();

        return redirect()->back();
    }
}
