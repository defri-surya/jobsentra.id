<?php

namespace App\Http\Controllers\Pencaker;

use App\Applyjob;
use App\Assesmen;
use App\Http\Controllers\Controller;
use App\Keahlian;
use App\Loker;
use App\Pencaker;
use App\Pendidikan;
use App\Pengalaman;
use App\Perusahaan;
use App\User;
use Illuminate\Http\Request;
use PDF;

class PencakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $data = Pencaker::with('skill', 'pendidikan', 'pengalaman', 'assesmen', 'user')->first();
        $datacv = Pencaker::with('skill', 'pendidikan', 'pengalaman', 'assesmen')->where('user_id', auth()->user()->id)->first();
        // dd($data);
        return view('Pencaker.cv', compact('data', 'datacv', 'user'));
    }

    public function lamaranku()
    {
        $apply = Applyjob::where('user_id', auth()->user()->id)->get();

        return view('Pencaker.lamaranku', compact('apply'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pencaker.settingcv');
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
            'user_id'       => 'required',
            'nama_lengkap'  => 'required',
            'tgl_lahir'     => 'required',
            'tmpt_lahir'    => 'required',
            'about'         => 'required',
            'email'         => 'required',
            'ig'            => 'required',
            'fb'            => 'required',
            'linkedin'      => 'required',
            'no_hp'         => 'required',
        ]);

        $data = $request->all();
        // dd($data);
        $data['status'] = 'Verifikasi';
        if ($request->has('foto')) {
            $foto = $request->foto;
            $new_foto = time() . 'FotoPencaker' . $foto->getClientOriginalName();
            $tujuan_uploud = 'uploads/FotoPencaker/';
            $foto->move($tujuan_uploud, $new_foto);
            $data['foto'] = $tujuan_uploud . $new_foto;
        }
        $pencaker = Pencaker::create($data);

        foreach ($data['keahlian'] as $item => $value) {
            $data2 = array(
                'user_id'     => $pencaker->user_id,
                'pencaker_id' => $pencaker->id,
                'keahlian'    => $data['keahlian'][$item],
                'grade'       => $data['grade'][$item]
            );
            Keahlian::create($data2);
        }

        foreach ($data['nama_sekolah'] as $result => $value) {
            $data3 = array(
                'user_id'       => $pencaker->user_id,
                'pencaker_id'   => $pencaker->id,
                'nama_sekolah'  => $data['nama_sekolah'][$result],
                'angkatan'      => $data['angkatan'][$result],
                'jurusan'       => $data['jurusan'][$result]
            );
            Pendidikan::create($data3);
        }

        foreach ($data['posisi'] as $value => $value) {
            $data4 = array(
                'user_id'           => $pencaker->user_id,
                'pencaker_id'       => $pencaker->id,
                'posisi'            => $data['posisi'][$value],
                'nama_perusahaan'   => $data['nama_perusahaan'][$value],
                'tgl_mulai'         => $data['tgl_mulai'][$value],
                'tgl_akhir'         => $data['tgl_akhir'][$value]
            );
            Pengalaman::create($data4);
        }

        foreach ($data['soal1'] as $key => $value) {
            $data5 = array(
                'user_id'       => $pencaker->user_id,
                'pencaker_id'   => $pencaker->id,
                'soal1'         => $data['soal1'][$key],
                'soal2'         => $data['soal2'][$key],
                'soal3'         => $data['soal3'][$key],
                'soal4'         => $data['soal4'][$key],
                'soal5'         => $data['soal5'][$key],
                'total_skor'    => $data['soal1'][$key] + $data['soal2'][$key] + $data['soal3'][$key] + $data['soal4'][$key] + $data['soal5'][$key]
            );
            Assesmen::create($data5);
        }

        return redirect()->route('infocv');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $loker = Loker::with('perusahaan')->where('kode_loker', $code)->first();
        $member = Assesmen::where('user_id', auth()->user()->id)->first();

        return view('Pencaker.detail_loker', compact('loker', 'member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pencaker::with('skill', 'pendidikan', 'pengalaman', 'assesmen')->findOrFail($id);

        return view('Pencaker.edit', compact('data'));
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
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'tgl_lahir' => 'required',
            'tmpt_lahir' => 'required',
            'about' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ]);

        $pencaker = Pencaker::findOrFail($id);
        $keahlian = Keahlian::where('pencaker_id', $id);
        $pendidikan = Pendidikan::where('pencaker_id', $id);
        $pengalaman = Pengalaman::where('pencaker_id', $id);

        if ($request->hasFile('foto')) {

            //upload new image
            $image = $request->file('foto');
            $new_foto = time() . 'FotoPencaker' . $image->getClientOriginalName();
            $tujuan_uploud = 'uploads/FotoPencaker/';
            $image->move($tujuan_uploud, $new_foto);

            //delete old image in local
            if (file_exists(($pencaker->foto))) {
                unlink(($pencaker->foto));
            }

            //update with new image
            $pencaker->update([
                'foto'    => $tujuan_uploud . $new_foto,
                'user_id' => $request->user_id,
                'nama_lengkap' => $request->nama_lengkap,
                'tgl_lahir' => $request->tgl_lahir,
                'tmpt_lahir' => $request->tmpt_lahir,
                'about' => $request->about,
                'email' => $request->email,
                'ig' => $request->ig,
                'fb' => $request->fb,
                'linkedin' => $request->linkedin,
                'no_hp' => $request->no_hp,
            ]);

            $keahlian->update([
                'user_id'     => auth()->user()->id,
                'pencaker_id' => $id,
                'keahlian'    => $request->keahlian,
                'grade'       => $request->grade
            ]);

            $pendidikan->update([
                'user_id'       => auth()->user()->id,
                'pencaker_id'   => $id,
                'nama_sekolah'  => $request->nama_sekolah,
                'angkatan'      => $request->angkatan,
                'jurusan'       => $request->jurusan
            ]);

            $pengalaman->update([
                'user_id'           => auth()->user()->id,
                'pencaker_id'       => $id,
                'posisi'            => $request->posisi,
                'nama_perusahaan'   => $request->nama_perusahaan,
                'tgl_mulai'         => $request->tgl_mulai,
                'tgl_akhir'         => $request->tgl_akhir
            ]);
        } else {
            //update without image
            $pencaker->update([
                'user_id' => $request->user_id,
                'nama_lengkap' => $request->nama_lengkap,
                'tgl_lahir' => $request->tgl_lahir,
                'tmpt_lahir' => $request->tmpt_lahir,
                'about' => $request->about,
                'email' => $request->email,
                'ig' => $request->ig,
                'fb' => $request->fb,
                'linkedin' => $request->linkedin,
                'no_hp' => $request->no_hp,
            ]);

            $keahlian->update([
                'user_id'     => auth()->user()->id,
                'pencaker_id' => $id,
                'keahlian'    => $request->keahlian,
                'grade'       => $request->grade
            ]);

            $pendidikan->update([
                'user_id'       => auth()->user()->id,
                'pencaker_id'   => $id,
                'nama_sekolah'  => $request->nama_sekolah,
                'angkatan'      => $request->angkatan,
                'jurusan'       => $request->jurusan
            ]);

            $pengalaman->update([
                'user_id'           => auth()->user()->id,
                'pencaker_id'       => $id,
                'posisi'            => $request->posisi,
                'nama_perusahaan'   => $request->nama_perusahaan,
                'tgl_mulai'         => $request->tgl_mulai,
                'tgl_akhir'         => $request->tgl_akhir
            ]);
        }

        return redirect()->route('infocv');
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

    public function exportpdf()
    {

        return view('export.exportpdf');
    }

    public function print()
    {
        $data = Pencaker::with('skill', 'pendidikan', 'pengalaman', 'assesmen')->first();
        $datacv = Pencaker::with('skill', 'pendidikan', 'pengalaman', 'assesmen')->where('user_id', auth()->user()->id)->first();

        return view('export.print', compact('data', 'datacv'));
    }
}
