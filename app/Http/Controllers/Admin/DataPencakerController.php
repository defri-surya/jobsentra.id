<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pencaker;
use Illuminate\Http\Request;
use App\User;

class DataPencakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pencaker::with('user')->paginate(10);
        
        return view('Admin.Datapencaker.index', compact('data'));
    }

    public function search(Request $request)
    {
        $data = Pencaker::with('user')->paginate(10);
        $user = User::with('pencaker')->get();

        if ($request->search != null) {
            $datasearch = User::with('pencaker')->where('kode_registrasi', 'LIKE', "%" . $request->search . "%")
                ->get();
            return view('Admin.Datapencaker.index_duplicate', compact('datasearch', 'user', 'data'));
        } else {
            alert()->info('Data yang anda cari tidak ditemukan!');
            return view('Admin.Datapencaker.index', compact('user', 'data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pencaker::find($id);

        return view('Admin.Datapencaker.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

