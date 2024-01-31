@extends('layouts.frontend.main')
@section('css')
    <style>
        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            flex: 1 0 100%;
        }

        @media only screen and (max-width: 600px) {
            .loker {
                margin-top: 15px;
            }

            .title {
                margin-top: 23%
            }

            .image {
                margin-top: -20%;
                max-width: 250px;
            }

            .form-search {
                margin-left: -40px;
                margin-top: -21%;
            }

            .heading {
                margin-left: 12%;
            }

            .social {
                margin-left: 12%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="untree_co-section mt-5">
        <div class="container">
           <h1>Detail Lowongan Kerja Favorit<h1>

            <div class="item">
                <div class="media-1">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5> <span class="d-block"> DIBUTUHKAN</span></h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="judullokerfavorit">{{ $lokerfavorit->judul }}</h2>
                                </div>
                            </div>
                          
                            <a href="#" class="d-block mb-3 text-center"><img
                                    src="{{ asset($lokerfavorit->perusahaan['logo']) }}" alt="Image"
                                    class="img-fluid" width="20%" ></a>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="JudulLokerFavorit">
                                        {{ $lokerfavorit->perusahaan['nama_perusahaan'] }}</h2>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50px">
                                                {{-- <i class="fas fa-map-marker-alt" style="font-size: 50%; margin-top: -50px"></i> --}}
                                            </td>
                                            <td style="font-size: medium">
                                                <p>
                                                    <i class="fas fa-map-marker-alt" style="font-size: 100%; margin-top: -50px"></i>
                                                    {{ $lokerfavorit->perusahaan['alamat'] }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50px">
                                                {{-- <i class="fas fa-graduation-cap" style="font-size: 50%; margin-top: -50px"></i> --}}
                                            </td>
                                            <td style="font-size: medium">
                                                <p>
                                                    <i class="fas fa-graduation-cap" style="font-size: 100%; margin-top: -50px"></i>
                                                    {{ $lokerfavorit->pendidikan_min }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{-- <i class="fas fa-business-time" style="font-size: 50%; margin-top: -50px"></i> --}}
                                            </td>
                                            <td style="font-size: medium">
                                                <p>
                                                    <i class="fas fa-business-time" style="font-size: 100%; margin-top: -50px"></i>
                                                    {{ $lokerfavorit->status_kerja }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td>
                                                {{-- <i class="fas fa-business-time" style="font-size: 50%; margin-top: -50px"></i> --}}
                                            </td>
                                            <td style="font-size: medium">
                                                <p>
                                                    <i class="fas fa-business-time" style="font-size: 100%; margin-top: -50px"></i>
                                                    {{ $lokerfavorit->jurusan }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{-- <i class="fas fa-business-time" style="font-size: 50%; margin-top: -50px"></i> --}}
                                            </td>
                                            <td style="font-size: medium">
                                                <p>
                                                    <i class="fas fa-business-time" style="font-size: 100%; margin-top: -50px"></i>
                                                    {{ $lokerfavorit->tgl_mulai }} Sampai  {{ $lokerfavorit->tgl_akhir }} 
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h3>Deskripsi</h3>
                                <p style="font-size: 14px">
                                    {{ $lokerfavorit->deskripsi }}
                                </p>
                            </div>
                            <div class="center">
                                <a href="{{ route('register.member') }}" class="btn btn-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

