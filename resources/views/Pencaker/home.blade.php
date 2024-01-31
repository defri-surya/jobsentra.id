@extends('layouts.backend.master')

@section('title', 'Home | Pencari Kerja')

@section('content')
    <div id="content">
        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span8 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h4>&nbsp;Rekomendasi Lowongan Kerja</h4>
                                </header>
                                @if ($member == null)
                                    <div class="body text-center">
                                        <p><i><b>Mohon lengkapi CV terlebih dahulu!</b></i></p>
                                    </div>
                                @else
                                    @if ($member != null)
                                        @if ($member->total_skor >= 1 and $member->total_skor <= 10)
                                            @foreach ($low as $lw)
                                                <div class="body">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset($lw->perusahaan->logo) }}"
                                                                        alt=""
                                                                        style="border: 2px solid #c7c7c7; padding: 5px; border-radius: 15px; vertical-align: middle; max-width: 200px">
                                                                </td>
                                                                <td>
                                                                    <h4 style="margin-top: 0">{{ $lw->judul }}
                                                                    </h4>
                                                                    <h5 style="margin-top: 20px">
                                                                        {{ $lw->perusahaan->nama_perusahaan }}
                                                                    </h5>
                                                                    @php
                                                                        $lok = App\Models\Regency::where('id', $lw->lokasi)->first();
                                                                    @endphp
                                                                    <h6 style="margin-top: 30px">
                                                                        <i
                                                                            class="icon-map-marker"></i>&nbsp;{{ $lok->name }}
                                                                    </h6>
                                                                    <h6 style="margin-top: 0">
                                                                        <i
                                                                            class="icon-time"></i>&nbsp;{{ $lw->status_kerja }}
                                                                    </h6>
                                                                    <h6 style="margin-top: 0">
                                                                        <i
                                                                            class="fas fa-graduation-cap"></i>&nbsp;{{ $lw->pendidikan_min }}
                                                                    </h6>
                                                                    <div style="float: right">
                                                                        <a href="{{ route('detailLowongan', $lw->kode_loker) }}"
                                                                            class="btn btn-primary"
                                                                            style="margin-bottom: 0; text-transform: uppercase">
                                                                            Detail</a>
                                                                        <form method="POST"
                                                                            action="{{ route('applyjob.store', $lw->id) }}"
                                                                            style="display: inline-block">
                                                                            @csrf
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ auth()->user()->id }}">
                                                                            <input type="hidden" name="pencaker_id"
                                                                                value="{{ $member->pencaker_id }}">
                                                                            <input type="hidden" name="job_id"
                                                                                value="{{ $lw->id }}">
                                                                            <input type="hidden" name="company_id"
                                                                                value="{{ $lw->company_id }}">
                                                                            <button class="btn btn-warning"
                                                                                style="margin-bottom: 0; text-transform: uppercase">
                                                                                Apply Now
                                                                            </button>
                                                                        </form>
                                                                        @php
                                                                            $apply = App\Applyjob::where('job_id', $lw->id)->get();
                                                                        @endphp
                                                                        @foreach ($apply as $app)
                                                                            <span
                                                                                style="text-align: right">{{ $app['status'] }}</span>
                                                                        @endforeach
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
                                        @elseif ($member->total_skor >= 11 and $member->total_skor <= 14)
                                            @foreach ($medium as $key)
                                                <div class="body">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset($key->perusahaan->logo) }}"
                                                                        alt=""
                                                                        style="border: 2px solid #c7c7c7; padding: 5px; border-radius: 15px; vertical-align: middle; max-width: 200px">
                                                                </td>
                                                                <td>
                                                                    <h4 style="margin-top: 0">{{ $key->judul }}
                                                                    </h4>
                                                                    <h5 style="margin-top: 20px">
                                                                        {{ $key->perusahaan->nama_perusahaan }}
                                                                    </h5>
                                                                    @php
                                                                        $lok = App\Models\Regency::where('id', $key->lokasi)->first();
                                                                    @endphp
                                                                    <h6 style="margin-top: 30px">
                                                                        <i
                                                                            class="icon-map-marker"></i>&nbsp;{{ $lok->name }}
                                                                    </h6>
                                                                    <h6 style="margin-top: 0">
                                                                        <i
                                                                            class="icon-time"></i>&nbsp;{{ $key->status_kerja }}
                                                                    </h6>
                                                                    <h6 style="margin-top: 0">
                                                                        <i
                                                                            class="fas fa-graduation-cap"></i>&nbsp;{{ $key->pendidikan_min }}
                                                                    </h6>
                                                                    <div style="float: right">
                                                                        <a href="{{ route('detailLowongan', $key->kode_loker) }}"
                                                                            class="btn btn-primary"
                                                                            style="margin-bottom: 0; text-transform: uppercase">
                                                                            Detail</a>
                                                                        <form method="POST"
                                                                            action="{{ route('applyjob.store', $key->id) }}"
                                                                            style="display: inline-block">
                                                                            @csrf
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ auth()->user()->id }}">
                                                                            <input type="hidden" name="pencaker_id"
                                                                                value="{{ $member->pencaker_id }}">
                                                                            <input type="hidden" name="job_id"
                                                                                value="{{ $key->id }}">
                                                                            <input type="hidden" name="company_id"
                                                                                value="{{ $key->company_id }}">
                                                                            <button class="btn btn-warning"
                                                                                style="margin-bottom: 0; text-transform: uppercase">
                                                                                Apply Now
                                                                            </button>
                                                                        </form>
                                                                        @php
                                                                            $apply = App\Applyjob::where('job_id', $key->id)->get();
                                                                        @endphp
                                                                        @foreach ($apply as $app)
                                                                            <span
                                                                                style="text-align: right">{{ $app['status'] }}</span>
                                                                        @endforeach
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
                                        @elseif ($member->total_skor >= 15 and $member->total_skor <= 20)
                                            @foreach ($good as $gd)
                                                <div class="body">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src="{{ asset($gd->perusahaan->logo) }}"
                                                                        alt=""
                                                                        style="border: 2px solid #c7c7c7; padding: 5px; border-radius: 15px; vertical-align: middle; max-width: 200px">
                                                                </td>
                                                                <td>
                                                                    <h4 style="margin-top: 0">{{ $gd->judul }}
                                                                    </h4>
                                                                    <h5 style="margin-top: 20px">
                                                                        {{ $gd->perusahaan->nama_perusahaan }}
                                                                    </h5>
                                                                    @php
                                                                        $lok = App\Models\Regency::where('id', $gd->lokasi)->first();
                                                                    @endphp
                                                                    <h6 style="margin-top: 30px">
                                                                        <i
                                                                            class="icon-map-marker"></i>&nbsp;{{ $lok->name }}
                                                                    </h6>
                                                                    <h6 style="margin-top: 0">
                                                                        <i
                                                                            class="icon-time"></i>&nbsp;{{ $gd->status_kerja }}
                                                                    </h6>
                                                                    <h6 style="margin-top: 0">
                                                                        <i
                                                                            class="fas fa-graduation-cap"></i>&nbsp;{{ $gd->pendidikan_min }}
                                                                    </h6>
                                                                    <div style="float: right">
                                                                        <a href="{{ route('detailLowongan', $gd->kode_loker) }}"
                                                                            class="btn btn-primary"
                                                                            style="margin-bottom: 0; text-transform: uppercase">
                                                                            Detail</a>
                                                                        <form method="POST"
                                                                            action="{{ route('applyjob.store', $gd->id) }}"
                                                                            style="display: inline-block">
                                                                            @csrf
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ auth()->user()->id }}">
                                                                            <input type="hidden" name="pencaker_id"
                                                                                value="{{ $member->pencaker_id }}">
                                                                            <input type="hidden" name="job_id"
                                                                                value="{{ $gd->id }}">
                                                                            <input type="hidden" name="company_id"
                                                                                value="{{ $gd->company_id }}">
                                                                            <button class="btn btn-warning"
                                                                                style="margin-bottom: 0; text-transform: uppercase">
                                                                                Apply Now
                                                                            </button>
                                                                        </form>
                                                                        @php
                                                                            $apply = App\Applyjob::where('job_id', $gd->id)->get();
                                                                        @endphp
                                                                        @foreach ($apply as $app)
                                                                            <span
                                                                                style="text-align: right">{{ $app['status'] }}</span>
                                                                        @endforeach
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.row-fluid -->
            </div>
            <!-- /.outer -->
        </div>
    </div>
@endsection
