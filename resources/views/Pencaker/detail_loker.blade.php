@extends('layouts.backend.master')

@section('title', 'Home | Pencari Kerja')

@section('content')
    <div id="content">
        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h5>&nbsp;Detail Lowongan Kerja &#9658; {{ $loker->perusahaan->nama_perusahaan }} -
                                        {{ $loker->judul }}</h5>
                                </header>
                                <div class="body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($loker->perusahaan->logo) }}" alt=""
                                                        style="border: 2px solid #c7c7c7; padding: 5px; border-radius: 15px; vertical-align: middle; max-width: 200px">
                                                </td>
                                                <td>
                                                    <h4 style="margin-top: 0">{{ $loker->judul }}
                                                    </h4>
                                                    <h5 style="margin-top: 20px">
                                                        {{ $loker->perusahaan->nama_perusahaan }}
                                                    </h5>
                                                    @php
                                                        $lok = App\Models\Regency::where('id', $loker->lokasi)->first();
                                                    @endphp
                                                    <h6 style="margin-top: 30px">
                                                        <i class="icon-map-marker"></i>&nbsp;{{ $lok->name }}
                                                    </h6>
                                                    <h6 style="margin-top: 0">
                                                        <i class="icon-time"></i>&nbsp;{{ $loker->status_kerja }}
                                                    </h6>
                                                    <h6 style="margin-top: 0">
                                                        <i
                                                            class="fas fa-graduation-cap"></i>&nbsp;{{ $loker->pendidikan_min }}
                                                    </h6>
                                                    <div>
                                                        <form method="POST"
                                                            action="{{ route('applyjob.store', $loker->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ auth()->user()->id }}">
                                                            <input type="hidden" name="pencaker_id"
                                                                value="{{ $member->pencaker_id }}">
                                                            <input type="hidden" name="job_id"
                                                                value="{{ $loker->id }}">
                                                            <input type="hidden" name="company_id"
                                                                value="{{ $loker->company_id }}">
                                                            <button class="btn btn-warning"
                                                                style="margin-bottom: 0; text-transform: uppercase">
                                                                Apply Now
                                                            </button>
                                                        </form>
                                                        @php
                                                            $apply = App\Applyjob::where('job_id', $loker->id)->get();
                                                        @endphp
                                                        @foreach ($apply as $app)
                                                            <span style="text-align: right">{{ $app['status'] }}</span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h4>Deskripsi :</h4>
                                    <p style="text-align: justify">{{ $loker->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.row-fluid -->
        </div>
        <!-- /.outer -->
    </div>
@endsection
