<?php

namespace App\Http\Controllers;

use App\Applyjob;
use App\Assesmen;
use App\Loker;
use App\Pencaker;
use App\Perusahaan;
use App\Partnership;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'member') {
            $member = Assesmen::where('user_id', auth()->user()->id)->first();
            // dd($member->total_skor);
            $data = Perusahaan::with('loker')->get();
            $minlow = 1;
            $maxlow = 10;
            $minmed = 11;
            $maxmed = 14;
            $mingood = 15;
            $maxgood = 20;
            $low = Loker::with('perusahaan')->whereBetween('skor', [$minlow, $maxlow])->get();
            $medium = Loker::with('perusahaan')->whereBetween('skor', [$minmed, $maxmed])->get();
            $good = Loker::with('perusahaan')->whereBetween('skor', [$mingood, $maxgood])->get();
            return view('Pencaker.home', compact('data', 'low', 'medium', 'good', 'member'));
        } elseif (auth()->user()->role == 'admin') {
            $data = Partnership::all();
            return view('Admin.index', compact('data'));
        } else {
            $loker = Loker::where('user_id', auth()->user()->id)->get();
            return view('Perusahaan.home', compact('loker'));
        }
    }
}
