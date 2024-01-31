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
                                    <h5 style="font-size: large">&nbsp;Curiculum Vitae</h5>
                                    <div class="toolbar">
                                        @if ($datacv == null)
                                            <a href="{{ route('settingcv') }}" rel="tooltip" data-placement="bottom"
                                                class="btn btn-defualt">
                                                <i class="fas fa-edit"></i> Edit CV
                                            </a>
                                        @else
                                            <a href="{{ route('editcv', $datacv->id) }}" rel="tooltip"
                                                data-placement="bottom" class="btn btn-defualt">
                                                <i class="fas fa-edit"></i> Edit CV
                                            </a>
                                        @endif
                                    </div>
                                    <div class="toolbar">
                                        @if ($datacv != null)
                                            <a href="{{ route('print') }}" rel="tooltip" data-placement="bottom"
                                                class="btn btn-primary">
                                                <i class="fas fa-print"></i> Print
                                            </a>
                                        @endif
                                    </div>
                                </header>
                                <div class="body">
                                    <h5 style="font-size: large">Kode Registrasi</h5>
                                    <p>
                                        <b>{{ $user->kode_registrasi }}</b>
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">Nama Lengkap</h5>
                                    @if ($datacv == null)
                                        <p>
                                            <i>Data kosong!</i>
                                        </p>
                                    @else
                                        <p>
                                            {{ $datacv->nama_lengkap }}
                                        </p>
                                    @endif
                                    <h5 style="font-size: large; margin-top: 25px">Tempat, Tanggal Lahir</h5>
                                    @if ($datacv == null)
                                        <p>
                                            <i>Data kosong!</i>
                                        </p>
                                    @else
                                        <p>
                                            {{ $datacv->tmpt_lahir }},
                                            {{ Carbon\Carbon::parse($datacv->tgl_lahir)->translatedFormat('d F Y') }}
                                        </p>
                                    @endif
                                    <h5 style="font-size: large; margin-top: 25px">About Me</h5>
                                    @if ($datacv == null)
                                        <p>
                                            <i>Data kosong!</i>
                                        </p>
                                    @else
                                        <p>
                                            {!! $datacv->about !!}
                                        </p>
                                    @endif
                                    <h5 style="font-size: large; margin-top: 25px">Pendidikan</h5>
                                    @if ($datacv == null)
                                        <p>
                                            <i>Data kosong!</i>
                                        </p>
                                    @else
                                        <table>
                                            @foreach ($datacv->pendidikan as $pendidikan)
                                                <tr>
                                                    <td>
                                                        <h5 style="margin-top: 0">{{ $pendidikan->angkatan }}</h5>
                                                    </td>
                                                    <td>
                                                        <p style="margin-top: 0">
                                                            {{ $pendidikan->nama_sekolah }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p style="margin-top: 0">
                                                            {{ $pendidikan->jurusan }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif

                                    <h5 style="font-size: large; margin-top: 25px">Pengalaman Kerja</h5>
                                    @if ($datacv == null)
                                        <p>
                                            <i>Data kosong!</i>
                                        </p>
                                    @else
                                        <table>
                                            <tbody>
                                                @foreach ($datacv->pengalaman as $pengalaman)
                                                    <tr>
                                                        <td>
                                                            <h5 style="margin-top: 0">
                                                                {{ Carbon\Carbon::parse($pengalaman->tgl_mulai)->translatedFormat('d F Y') }}&nbsp;<b>&#8211;</b>&nbsp;{{ Carbon\Carbon::parse($pengalaman->tgl_akhir)->translatedFormat('d F Y') }}
                                                            </h5>
                                                        </td>
                                                        <td>
                                                            <p style="margin-top: 0">{{ $pengalaman->nama_perusahaan }}</p>
                                                        </td>
                                                        <td>
                                                            <p style="margin-top: 0">{{ $pengalaman->posisi }}</p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif

                                    <h5 style="font-size: large; margin-top: 25px">Skill</h5>
                                    @if ($datacv == null)
                                        <p>
                                            <i>Data kosong!</i>
                                        </p>
                                    @else
                                        <div class="row-fluid">
                                            <div class="span3">
                                                @foreach ($datacv->skill as $skill)
                                                    <p style="margin-top: 0">{{ $skill->keahlian }}</p>
                                                @endforeach
                                            </div>
                                            <div class="span7">
                                                @foreach ($datacv->skill as $skill)
                                                    @if ($skill->grade == 'LOW')
                                                        <div class="progress">
                                                            <div class="bar bar-warning" style="width: 20%">
                                                                <span style="color: #000">LOW</span>
                                                            </div>
                                                            <div style="width: 20%">
                                                                <span style="color: #000">MEDIUM</span>
                                                            </div>
                                                            <div style="width: 20%">
                                                                <span style="color: #000">GOOD</span>
                                                            </div>
                                                            <div style="width: 20%">
                                                                <span style="color: #000">VERY GOOD</span>
                                                            </div>
                                                            <div style="width: 20%">
                                                                <span style="color: #000">EXPERT</span>
                                                            </div>
                                                        </div>
                                                    @elseif ($skill->grade == 'MEDIUM')
                                                        <div class="progress">
                                                            <div class="bar bar-warning" style="width: 20%">
                                                                {{-- <span style="color: #000">LOW</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%">
                                                                <span style="color: #000">MEDIUM</span>
                                                            </div>
                                                            <div style="width: 20%">
                                                                <span style="color: #000">GOOD</span>
                                                            </div>
                                                            <div style="width: 20%">
                                                                <span style="color: #000">VERY GOOD</span>
                                                            </div>
                                                            <div style="width: 20%">
                                                                <span style="color: #000">EXPERT</span>
                                                            </div>
                                                        </div>
                                                    @elseif ($skill->grade == 'GOOD')
                                                        <div class="progress">
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">LOW</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">MEDIUM</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                <span style="color: #000">GOOD</span>
                                                            </div>
                                                            <div style="width: 20%;">
                                                                <span style="color: #000">VERY GOOD</span>
                                                            </div>
                                                            <div style="width: 20%;">
                                                                <span style="color: #000">EXPERT</span>
                                                            </div>
                                                        </div>
                                                    @elseif ($skill->grade == 'VERY GOOD')
                                                        <div class="progress">
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">LOW</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">MEDIUM</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">GOOD</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                <span style="color: #000">VERY GOOD</span>
                                                            </div>
                                                            <div style="width: 20%;">
                                                                <span style="color: #000">EXPERT</span>
                                                            </div>
                                                        </div>
                                                    @elseif ($skill->grade == 'EXPERT')
                                                        <div class="progress">
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">LOW</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">MEDIUM</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">GOOD</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                {{-- <span style="color: #000">VERY GOOD</span> --}}
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 20%;">
                                                                <span style="color: #000">EXPERT</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    <h5 style="font-size: large; margin-top: 25px">Personal Assesment</h5>
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <p style="margin-top: 0">Personality, Attitude, Values</p>
                                        </div>
                                        @if ($datacv == null)
                                            <p>
                                                <i>Data kosong!</i>
                                            </p>
                                        @else
                                            <div class="span7">
                                                <div class="progress">
                                                    @foreach ($datacv->assesmen as $assesmen)
                                                        @if ($assesmen->total_skor >= 1 and $assesmen->total_skor <= 10)
                                                            <div class="bar bar-warning" style="width: 33.33%;">
                                                                <span style="color: #000">(Total Skor
                                                                    {{ $assesmen->total_skor }})
                                                                    LOW</span>
                                                            </div>
                                                            <div style="width: 33.33%;">
                                                                <span style="color: #000">({{ $assesmen->total_skor }}%)
                                                                    MEDIUM</span>
                                                            </div>
                                                            <div style="width: 33.33%;">
                                                                <span style="color: #000">({{ $assesmen->total_skor }}%)
                                                                    GOOD</span>
                                                            </div>
                                                        @elseif ($assesmen->total_skor >= 11 and $assesmen->total_skor <= 14)
                                                            <div class="bar bar-warning" style="width: 33.33%;">
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 33.33%;">
                                                                <span style="color: #000">({{ $assesmen->total_skor }}%)
                                                                    MEDIUM</span>
                                                            </div>
                                                            <div style="width: 33.33%;">
                                                                <span style="color: #000">({{ $assesmen->total_skor }}%)
                                                                    GOOD</span>
                                                            </div>
                                                        @elseif ($assesmen->total_skor >= 15 and $assesmen->total_skor <= 20)
                                                            <div style="width: 33.33%;">
                                                            </div>
                                                            <div style="width: 33.33%;">
                                                            </div>
                                                            <div class="bar bar-warning" style="width: 33.33%;">
                                                                <span style="color: #000">({{ $assesmen->total_skor }}%)
                                                                    GOOD</span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <h5 style="font-size: large; margin-top: 25px">Kontak</h5>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <p style="margin-top: 0">Email</p>
                                            <p style="margin-top: 0">Telp</p>
                                        </div>
                                        <div class="span10">
                                            @if ($datacv == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $datacv->email }}</p>
                                            @endif
                                            @if ($datacv == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $datacv->no_hp }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <h5 style="font-size: large; margin-top: 25px">Social Media</h5>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <p style="margin-top: 0">Instagram</p>
                                            <p style="margin-top: 0">Facebook</p>
                                            <p style="margin-top: 0">LinkedIn</p>
                                        </div>
                                        <div class="span10">
                                            @if ($datacv == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $datacv->ig }}</p>
                                            @endif
                                            @if ($datacv == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $datacv->fb }}</p>
                                            @endif
                                            @if ($datacv == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $datacv->linkedin }}</p>
                                            @endif
                                        </div>
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
    </div>
@endsection
