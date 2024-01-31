<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loker;
use Illuminate\Http\Request;
use App\Perusahaan;
use App\User;
use Illuminate\Support\Facades\DB;

class DataPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Perusahaan::with('user')->paginate(10);

        return view('Admin.Dataperusahaan.index', compact('data'));
    }

    public function search(Request $request, $id)
    {
        $data = Perusahaan::find($id);
        $loker = Loker::where('company_id', $id)->paginate(10);

        // dd($request->search);

            if ($request->search != null) {
                $datasearch = Loker::where('kode_loker', 'LIKE', "%" . $request->search . "%")
                    ->get();
                return view('Admin.Dataperusahaan.show_duplicate', compact('datasearch', 'data', 'loker'));
            } else {
                alert()->info('Data yang anda cari tidak ditemukan!');
                return view('Admin.Dataperusahaan.show', compact('data', 'loker'));
            }
    }

    public function search_company(Request $request)
    {
        $data = Perusahaan::with('user')->paginate(10);

            if ($request->search != null) {
                $datasearchcompany = User::with('perusahaan')->where('kode_registrasi', 'LIKE', "%" . $request->search . "%")
                    ->get();
                return view('Admin.Dataperusahaan.index_duplicate', compact('data', 'datasearchcompany'));
            } else {
                alert()->info('Data yang anda cari tidak ditemukan!');
                return view('Admin.Dataperusahaan.index', compact('data'));
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
        $data = Perusahaan::with('user')->find($id);
        $loker = Loker::where('company_id', $id)->paginate(10);

        return view('Admin.Dataperusahaan.show', compact('data', 'loker'));
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
    public function update(Request $request, $id, $key)
    {
        $data = Perusahaan::find($id);
        $loker = Loker::findOrFail($key);

        $loker->update([
            'status' => 'Favorit'
        ]);

        return redirect()->route('dataperusahaan.show', $data->id);
    }

    public function hapus_favorit(Request $request, $id, $key)
    {
        $data = Perusahaan::find($id);
        $loker = Loker::findOrFail($key);

        $loker->update([
            'status' => 'Standar'
        ]);

        return redirect()->route('dataperusahaan.show', $data->id);
    }

    public function verifikasi(Request $request, $id)
    {
        $data = Perusahaan::find($id);
        $status = $request->status_company;

        $data->update([
            'status' => 'Verifikasi'
        ]);

        foreach ($status as $key => $value) {
            Loker::where('company_id', $id)
                ->update(['status_company' => $value]);
        }

        return redirect()->route('dataperusahaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
