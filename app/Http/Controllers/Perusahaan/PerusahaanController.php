<?php

namespace App\Http\Controllers\Perusahaan;

use App\Applyjob;
use App\Http\Controllers\Controller;
use App\Perusahaan;
use App\User;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Applyjob::where('job_id', $id)->get();

        return view('Perusahaan.listpelamar', compact('data'));
    }

    public function profile()
    {
        $data = Perusahaan::with('user')->where('user_id', auth()->user()->id)->first();
        $user = User::where('id', auth()->user()->id)->first();

        return view('Perusahaan.profilecompany', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Perusahaan.setting');
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
            'user_id' => 'required',
        ]);

        $data = $request->all();
        // dd($data);
        $data['status'] = 'Belum Verifikasi';

        if ($request->has('logo')) {
            $logo = $request->logo;
            $new_logo = time() . 'logocompany' . $logo->getClientOriginalName();
            $tujuan_uploud = 'upload/logocompany/';
            $logo->move($tujuan_uploud, $new_logo);
            $data['logo'] = $tujuan_uploud . $new_logo;
        }

        Perusahaan::create($data);
        return redirect()->route('profilecompany');
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
        $data = Perusahaan::where('user_id', auth()->user()->id)->findOrFail($id);
        return view('Perusahaan.edit', compact('data'));
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
        ]);

        $data = Perusahaan::findOrFail($id);

        if ($request->hasFile('logo')) {

            //upload new image
            $image = $request->file('logo');
            $new_foto = time() . 'logocompany' . $image->getClientOriginalName();
            $tujuan_uploud = 'upload/logocompany/';
            $image->move($tujuan_uploud, $new_foto);

            //delete old image in local
            if (file_exists(($data->logo))) {
                unlink(($data->logo));
            }

            //update with new image
            $data->update([
                'logo'              => $tujuan_uploud . $new_foto,
                'user_id'           => $request->user_id,
                'nama_perusahaan'   => $request->nama_perusahaan,
                'about'             => $request->about,
                'location'          => $request->location,
                'alamat'            => $request->alamat,
                'kontak'            => $request->kontak,
            ]);
        } else {
            //update without image
            $data->update([
                'user_id'           => $request->user_id,
                'nama_perusahaan'   => $request->nama_perusahaan,
                'about'             => $request->about,
                'location'          => $request->location,
                'alamat'            => $request->alamat,
                'kontak'            => $request->kontak,
            ]);
        }
        return redirect()->route('profilecompany');
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
