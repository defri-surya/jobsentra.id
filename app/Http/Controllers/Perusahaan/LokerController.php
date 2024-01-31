<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Katagori_pekerjaan;
use App\Loker;
use Illuminate\Http\Request;
use App\Models\Regency;
use App\Perusahaan;
use Illuminate\Support\Str;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katagori_pekerjaan = Katagori_pekerjaan::all();
        $company            = Perusahaan::where('user_id', auth()->user()->id)->first();
        $kota               = Regency::all();
        if ($company->status == 'Belum Verifikasi') {
            alert()->info('Akun anda belum terverifikasi', 'Mohon menunggu 1x24 jam untuk proses verifikasi.');
            return redirect()->route('home');
        } else {
            return view('Perusahaan.buatloker', compact('katagori_pekerjaan', 'kota', 'company'));
        }
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
            'user_id'               => 'required',
            'company_id'            => 'required',
            'katagori_pekerjaan_id' => 'required',
            'judul'                 => 'required',
            'status_kerja'          => 'required',
            'pendidikan_min'        => 'required',
            'jurusan'               => 'required',
            'lokasi'                => 'required',
            'tgl_mulai'             => 'required',
            'tgl_akhir'             => 'required',
            'skor'                  => 'required',
            'deskripsi'             => 'required',
            'status_company'        => 'required',
        ]);

        $data = $request->all();
        $data['status'] = 'Standar';
        $data['kode_loker'] = date('Y') . Str::random(5);

        Loker::create($data);

        return redirect()->route('home');
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
        $data               = Loker::findOrFail($id);
        $katagori_pekerjaan = Katagori_pekerjaan::all();
        $kota               = Regency::all();
        $company            = Perusahaan::where('user_id', auth()->user()->id)->first();

        return view('Perusahaan.editloker', compact('data', 'katagori_pekerjaan', 'kota', 'company'));
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
            'user_id'               => 'required',
            'company_id'            => 'required',
            'katagori_pekerjaan_id' => 'required',
            'judul'                 => 'required',
            'status_kerja'          => 'required',
            'pendidikan_min'        => 'required',
            'jurusan'               => 'required',
            'lokasi'                => 'required',
            'tgl_mulai'             => 'required',
            'tgl_akhir'             => 'required',
            'skor'                  => 'required',
            'deskripsi'             => 'required',
        ]);

        $data = $request->all();
        $data['status'] = 'Standar';

        Loker::findOrFail($id)->update($data);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Loker::findOrFail($id)->delete();

        return redirect()->back();
    }
}
