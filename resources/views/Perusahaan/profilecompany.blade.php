@extends('layouts.backend.master')

@section('title', 'Home | Perusahaan')

@section('content')
    <div id="content">
        <div class="container-fluid outer">
            <div class="row-fluid">
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h5>Profile Perusahaan</h5>
                                    <div class="toolbar">
                                        @if ($data == null)
                                            <a href="{{ route('settingprofile') }}" rel="tooltip" data-placement="bottom"
                                                class="btn btn-defualt">
                                                <i class="fas fa-edit"></i> Edit Profile
                                            </a>
                                        @else
                                            <a href="{{ route('editprofile', $data->id) }}" rel="tooltip"
                                                data-placement="bottom" class="btn btn-defualt">
                                                <i class="fas fa-edit"></i> Edit Profile
                                            </a>
                                        @endif
                                    </div>
                                </header>
                                <div class="body">
                                    <h5 style="margin-left:3px">Kode Registrasi</h5>
                                    <p style="margin-left: 3px"><b>{{ $user->kode_registrasi }}</b></p>
                                    <h5 style="margin-top: 25px">Tentang Perusahaan</h5>
                                    @if ($data == null)
                                        <p style="margin-left: 3px"><i>Data tidak tersedia!</i></p>
                                    @else
                                        <p style="margin-left: 3px">{!! $data->about !!}</p>
                                    @endif
                                    <h5 style="margin-top: 25px; margin-left:3px">Alamat</h5>
                                    @if ($data == null)
                                        <p style="margin-left: 3px"><i>Data tidak tersedia!</i></p>
                                    @else
                                        <p style="margin-left: 3px">{{ $data->alamat }}</p>
                                    @endif
                                    <h5 style="margin-top: 25px; margin-left:3px">Kontak</h5>
                                    @if ($data == null)
                                        <p style="margin-left: 3px"><i>Data tidak tersedia!</i></p>
                                    @else
                                        <p style="margin-left: 3px">{{ $data->kontak }}</p>
                                    @endif
                                    <h5 style="margin-top: 25px; margin-left:3px">Map Location</h5>
                                    @if ($data == null)
                                        <p style="margin-left: 3px"><i>Data tidak tersedia!</i></p>
                                    @else
                                        <iframe src="{{ $data->location }}" width="600" height="350"
                                            style="border:1px solid #000; margin-left: 3px" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
