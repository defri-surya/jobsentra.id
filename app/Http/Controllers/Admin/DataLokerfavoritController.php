<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Loker;
use App\Perusahaan;

class DataLokerfavoritController extends Controller
{
    public function index()
    {
        $data = Loker::with('perusahaan')->where('status', 'Favorit')->paginate(10);

        return view('Admin.Datalokerfavorit.index', compact('data'));
    }

    public function search(Request $request)
    {
        $data = Loker::with('perusahaan')->where('status', 'Favorit')->paginate(10);

            if ($request->search != null) {
                $datasearch = Loker::with('perusahaan')->where('kode_loker', 'LIKE', "%" . $request->search . "%")
                    ->get();
                return view('Admin.Datalokerfavorit.index_duplicate', compact('datasearch', 'data'));
            } else {
                alert()->info('Data yang anda cari tidak ditemukan!');
                return view('Admin.Datalokerfavorit.index', compact('data'));
            }
    }

    public function verifikasi($id)
    {
        $data = Loker::with(['perusahaan'])->find($id);
        $data->update([
            'status' => 'Verifikasi'
        ]);

        return redirect('index');
    }

    public function batalverivikasi($id)
    {
        $data = Loker::with(['perusahaan'])->find($id);
        $data->update([
            'status' => 'Belum Verifikasi'
        ]);

        return redirect('index');
    }
}

