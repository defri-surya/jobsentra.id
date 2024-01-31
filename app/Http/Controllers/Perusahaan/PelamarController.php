<?php

namespace App\Http\Controllers\Perusahaan;

use App\Applyjob;
use App\Http\Controllers\Controller;
use App\Pencaker;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index($id)
    {
        $data = Pencaker::with('skill', 'pendidikan', 'pengalaman', 'assesmen')->where('id', $id)->first();

        return view('Perusahaan.detail-cv', compact('data'));
    }

    public function lanjut($id)
    {
        $data = Applyjob::findOrFail($id);
        $data->update([
            'status' => 'lanjut',
        ]);
        return redirect()->back();
    }

    public function ditolak($id)
    {
        $data = Applyjob::findOrFail($id);
        $data->update([
            'status' => 'ditolak',
        ]);
        return redirect()->back();
    }

    public function diterima($id)
    {
        $data = Applyjob::findOrFail($id);
        $data->update([
            'status' => 'diterima',
        ]);
        return redirect()->back();
    }
}
