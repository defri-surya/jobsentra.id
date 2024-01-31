<?php

namespace App\Http\Controllers;

use App\Katagori_pekerjaan;
use App\Loker;
use App\Models\Regency;
use App\Partnership;
use App\Perusahaan;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $client = new Client;
        $response = $client->request('GET', 'https://assesmen.mitrakampusjogja.com/api/testing', [
            'headers' => [
                'api_key' => 'nuswantara2022'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return view('getassesmen', compact('result'));
    }

    public function register_company()
    {
        return view('Homepage.register_company');
    }

    public function register_member()
    {
        return view('Homepage.register_member');
    }

    public function homepage()
    {
        $katagori    = Katagori_pekerjaan::all();
        $kota        = Regency::all();
        $loker       = Loker::with('perusahaan')->where('status_company', 'Verifikasi')->limit(8)->get();
        // dd($loker);
        $lokerfav    = Loker::with('perusahaan')->where('status', 'Favorit')->limit(8)->get();
        $partner     = Partnership::all();

        return view('Homepage.index', compact('kota', 'loker', 'katagori', 'partner', 'lokerfav'));
    }

    public function halamanloker()
    {
        $katagori    = Katagori_pekerjaan::all();
        $kota        = Regency::all();
        $loker       = Loker::with('perusahaan')->paginate(12);
        $partner     = Partnership::all();

        return view('Homepage.halamanloker2', compact('kota', 'loker', 'katagori', 'partner'));
    }

    public function search(Request $request)
    {
        $katagori    = Katagori_pekerjaan::all();
        $kota        = Regency::all();
        $loker       = Loker::with('perusahaan')->get();
        $partner     = Partnership::all();
        $lokerfav    = Loker::with('perusahaan')->where('status', 'Favorit')->limit(8)->get();

        if ($request->judul) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")->get();
        }
        if ($request->pendidikan) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")->get();
        }
        if ($request->lokasi) {
            $data = Loker::with('perusahaan')->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")->get();
        }
        if ($request->fullTime) {
            $data = Loker::with('perusahaan')->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")->get();
        }
        if ($request->partTime) {
            $data = Loker::with('perusahaan')->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")->get();
        }
        if ($request->freelance) {
            $data = Loker::with('perusahaan')->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")->get();
        }
        if ($request->magang) {
            $data = Loker::with('perusahaan')->where('status_kerja', 'LIKE', "%" . $request->magang . "%")->get();
        }
        if ($request->judul && $request->pendidikan != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->get();
        }
        if ($request->judul && $request->lokasi != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->get();
        }
        if ($request->judul && $request->fullTime != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->get();
        }
        if ($request->judul && $request->partTime != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->get();
        }
        if ($request->judul && $request->freelance != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->get();
        }
        if ($request->judul && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        }
        if ($request->judul && $request->pendidikan && $request->lokasi != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->get();
        }
        if ($request->judul && $request->pendidikan && $request->lokasi && $request->fullTime != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->get();
        }
        if ($request->judul && $request->pendidikan && $request->lokasi && $request->fullTime && $request->partTime != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->get();
        }
        if ($request->judul && $request->pendidikan && $request->lokasi && $request->fullTime && $request->partTime && $request->freelance != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->get();
        }
        if ($request->judul && $request->pendidikan && $request->lokasi && $request->fullTime && $request->partTime && $request->freelance && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        } else {
            return view('Homepage.index_duplicate4', compact('kota', 'loker', 'katagori', 'partner', 'lokerfav'));
        }
        if ($request->judul && $request->fullTime && $request->partTime != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->get();
        }
        if ($request->judul && $request->fullTime && $request->partTime && $request->freelance != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->get();
        }
        if ($request->judul && $request->fullTime && $request->partTime && $request->freelance && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('judul', 'LIKE', "%" . $request->judul . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        }
        if ($request->pendidikan && $request->lokasi != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->get();
        }
        if ($request->pendidikan && $request->fullTime != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->get();
        }
        if ($request->pendidikan && $request->partTime != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->get();
        }
        if ($request->pendidikan && $request->freelance != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->get();
        }
        if ($request->pendidikan && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        }
        if ($request->pendidikan && $request->lokasi != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->get();
        }
        if ($request->pendidikan && $request->fullTime && $request->partTime != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->get();
        }
        if ($request->pendidikan && $request->fullTime && $request->partTime && $request->freelance != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->get();
        }
        if ($request->pendidikan && $request->fullTime && $request->partTime && $request->freelance && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        }
        if ($request->pendidikan && $request->lokasi && $request->fullTime != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->get();
        }
        if ($request->pendidikan && $request->lokasi && $request->fullTime && $request->partTime != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->get();
        }
        if ($request->pendidikan && $request->lokasi && $request->fullTime && $request->partTime && $request->freelance != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->get();
        }
        if ($request->pendidikan && $request->lokasi && $request->fullTime && $request->partTime && $request->freelance && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('pendidikan_min', 'LIKE', "%" . $request->pendidikan . "%")
                ->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        }
        if ($request->lokasi && $request->fullTime != null) {
            $data = Loker::with('perusahaan')->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->get();
        }
        if ($request->lokasi && $request->partTime != null) {
            $data = Loker::with('perusahaan')->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->get();
        }
        if ($request->lokasi && $request->freelance != null) {
            $data = Loker::with('perusahaan')->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->get();
        }
        if ($request->lokasi && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        }
        if ($request->lokasi && $request->fullTime && $request->partTime != null) {
            $data = Loker::with('perusahaan')->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->get();
        }
        if ($request->lokasi && $request->fullTime && $request->partTime && $request->freelance != null) {
            $data = Loker::with('perusahaan')->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->get();
        }
        if ($request->lokasi && $request->fullTime && $request->partTime && $request->freelance && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('lokasi', 'LIKE', "%" . $request->lokasi . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        }
        if ($request->fullTime && $request->partTime && $request->freelance && $request->magang != null) {
            $data = Loker::with('perusahaan')->where('status_kerja', 'LIKE', "%" . $request->fullTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->partTime . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->freelance . "%")
                ->where('status_kerja', 'LIKE', "%" . $request->magang . "%")
                ->get();
        }

        return view('Homepage.index_duplicate', compact('kota', 'loker', 'katagori', 'data', 'partner', 'lokerfav'));
    }

    public function searchByKategori(Request $request)
    {
        $katagori    = Katagori_pekerjaan::all();
        $kota        = Regency::all();
        $loker       = Loker::with('perusahaan')->get();
        $partner     = Partnership::all();
        $lokerfav    = Loker::with('perusahaan')->where('status', 'Favorit')->limit(8)->get();

        if ($request->kategori == null) {
            return view('Homepage.index_duplicate3', compact('kota', 'loker', 'katagori', 'partner', 'lokerfav'));
        } else {
            $data2 = Loker::with('perusahaan')->where('katagori_pekerjaan_id', 'LIKE', "%" . $request->kategori . "%")
                ->get();
        }

        return view('Homepage.index_duplicate2', compact('kota', 'loker', 'katagori', 'data2', 'partner', 'lokerfav'));
    }

    public function searchByKategorihalaman(Request $request)
    {
        $katagori    = Katagori_pekerjaan::all();
        $kota        = Regency::all();
        $loker       = Loker::with('perusahaan')->get();

        if ($request->kategori == null) {
            return view('Homepage.halamanloker1', compact('kota', 'loker', 'katagori'));
        } else {
            $data2 = Loker::with('perusahaan')->where('katagori_pekerjaan_id', 'LIKE', "%" . $request->kategori . "%")
                ->get();
        }
        return view('Homepage.halamanloker', compact('kota', 'loker', 'katagori', 'data2'));
    }

    public function ktpekerjaan()
    {
        $kota        = Regency::all();
        $katagori    = Katagori_pekerjaan::all();
        $loker       = Katagori_pekerjaan::with('loker')->limit(8)->get();

        return view('Homepage.ktpekerjaan', compact('kota', 'loker', 'katagori'));
    }

    public function pelatihan()
    {
        return view('Homepage.pelatihan');
    }

    public function assesment()
    {
        return view('Homepage.assesment');
    }

    public function detailloker($code)
    {
        $loker    = Loker::with('perusahaan')->where('kode_loker', $code)->first();

        return view('Homepage.detailloker', compact('loker'));
    }

    public function detaillokerfavorit($code)
    {
        $lokerfavorit    = Loker::with('perusahaan')->where('kode_loker', $code)->first();

        return view('Homepage.detaillokerfavorit', compact('lokerfavorit'));
    }
}
