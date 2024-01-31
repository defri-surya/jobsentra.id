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
    </style>
@endsection

@section('content')
    <div class="hero" style="background-image: url('{{ asset('assets') }}/frontend/images/image-2.png'); height: 50%">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="intro-wrap">
                        <h1 class="mb-2"><span class="d-block">Build Your Career</span> Start Here <span class="typed-words"></span></h1>
                    </div>
                </div>
                <div class="col-lg-4" style="margin-right: 8%">
                    <div class="intro-wrap">
                        <img src="{{ asset('assets') }}/frontend/images/image-1.png" alt="Image" style="margin-top: 25%; max-width: 140%; ">
                    </div>
                </div>
                <div class="col-lg-4" style="margin-right:">
                    <div class="row">
                        <div class="col-12" style="margin-left: 10%">
                            <form class="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cari" value="{{ request('cari') }}" placeholder="Cari Lowongan ">
                                </div>
                                <div class="form-group">
                                    <select name="cari" value="{{ request('cari') }}" id="" class="form-control custom-select">
                                        <option selected disabled>Pendidikan</option>
                                        <option value="SMK">SMA / SMK</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="cari" value="{{ request('cari') }}" id="select2" class="form-control custom-select">
                                        <option selected disabled>Lokasi Kerja</option>
                                        @foreach ($kota as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="control  control--checkbox mt-3" name="cari" value="{{ request('cari') }}">
                                        <span value="Full Time" class="caption" >Full Time</span>
                                        <input type="checkbox" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="cari" value="{{ request('cari') }}" class="control control--checkbox mt-3">
                                        <span  value="Part Time" class="caption">Part Time</span>
                                        <input type="checkbox" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="cari" value="{{ request('cari') }}" class="control control--checkbox mt-3">
                                        <span value="Freelance" class="caption">Freelance</span>
                                        <input type="checkbox" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-6">
                                        <form action="{{ URL::current() }}" method="GET">
                                            <input type="submit" class="btn btn-primary btn-block" value="Search">
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section count-numbers py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="{{ totalPerusahaan() }}">0</span>
                        </div>
                        <span class="caption">Total Perusahaan Terdaftar</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="{{ totalPencaker() }}">0</span>
                        </div>
                        <span class="caption">Total Pencari Kerja Terdaftar</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="{{ totalLoker() }}">0</span>
                        </div>
                        <span class="caption">Total Lowongan Kerja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section" style="background: #1A374D">
        <div class="container">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-lg-7">
                    <h2 class="section-title text-center" style="color: #fff">Lowongan Kerja Favorit</h2>
                </div>
            </div>
            <div class="owl-carousel owl-3-slider">
                <div class="item">
                    <div class="media-1">
                        <div class="card">
                            <div class="card-header text-center">
                                <b>DIBUTUHKAN</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Job Vacancy Title</h3>
                                    </div>
                                </div>
                                <a href="#" class="d-flex mb-3 justify-content-center"><img
                                        src="{{ asset('assets') }}/frontend/images/hero-slider-3.jpg" alt="Image"
                                        style="max-width: 220px"></a>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Company Name</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </td>
                                                <td>
                                                    Lokasi
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-graduation-cap"></i>
                                                </td>
                                                <td>
                                                    Pendidikan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-business-time"></i>
                                                </td>
                                                <td>
                                                    Jam Kerja
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="center">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="media-1">
                        <div class="card">
                            <div class="card-header text-center">
                                <b>DIBUTUHKAN</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Job Vacancy Title</h3>
                                    </div>
                                </div>
                                <a href="#" class="d-flex mb-3 justify-content-center"><img
                                        src="{{ asset('assets') }}/frontend/images/hero-slider-3.jpg" alt="Image"
                                        style="max-width: 220px"></a>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Company Name</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </td>
                                                <td>
                                                    Lokasi
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-graduation-cap"></i>
                                                </td>
                                                <td>
                                                    Pendidikan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-business-time"></i>
                                                </td>
                                                <td>
                                                    Jam Kerja
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="center">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="media-1">
                        <div class="card">
                            <div class="card-header text-center">
                                <b>DIBUTUHKAN</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Job Vacancy Title</h3>
                                    </div>
                                </div>
                                <a href="#" class="d-flex mb-3 justify-content-center"><img
                                        src="{{ asset('assets') }}/frontend/images/hero-slider-3.jpg" alt="Image"
                                        style="max-width: 220px"></a>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Company Name</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </td>
                                                <td>
                                                    Lokasi
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-graduation-cap"></i>
                                                </td>
                                                <td>
                                                    Pendidikan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-business-time"></i>
                                                </td>
                                                <td>
                                                    Jam Kerja
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="center">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="media-1">
                        <div class="card">
                            <div class="card-header text-center">
                                <b>DIBUTUHKAN</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Job Vacancy Title</h3>
                                    </div>
                                </div>
                                <a href="#" class="d-flex mb-3 justify-content-center"><img
                                        src="{{ asset('assets') }}/frontend/images/hero-slider-3.jpg" alt="Image"
                                        style="max-width: 220px"></a>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Company Name</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </td>
                                                <td>
                                                    Lokasi
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-graduation-cap"></i>
                                                </td>
                                                <td>
                                                    Pendidikan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-business-time"></i>
                                                </td>
                                                <td>
                                                    Jam Kerja
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="center">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="media-1">
                        <div class="card">
                            <div class="card-header text-center">
                                <b>DIBUTUHKAN</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Job Vacancy Title</h3>
                                    </div>
                                </div>
                                <a href="#" class="d-flex mb-3 justify-content-center"><img
                                        src="{{ asset('assets') }}/frontend/images/hero-slider-3.jpg" alt="Image"
                                        style="max-width: 220px"></a>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Company Name</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </td>
                                                <td>
                                                    Lokasi
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-graduation-cap"></i>
                                                </td>
                                                <td>
                                                    Pendidikan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-business-time"></i>
                                                </td>
                                                <td>
                                                    Jam Kerja
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="center">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="media-1">
                        <div class="card">
                            <div class="card-header text-center">
                                <b>DIBUTUHKAN</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Job Vacancy Title</h3>
                                    </div>
                                </div>
                                <a href="#" class="d-flex mb-3 justify-content-center"><img
                                        src="{{ asset('assets') }}/frontend/images/hero-slider-3.jpg" alt="Image"
                                        style="max-width: 220px"></a>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3>Company Name</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </td>
                                                <td>
                                                    Lokasi
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-graduation-cap"></i>
                                                </td>
                                                <td>
                                                    Pendidikan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-business-time"></i>
                                                </td>
                                                <td>
                                                    Jam Kerja
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="center">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">Lowongan Kerja Terbaru</h2>
                </div>
            </div>
            {{-- <form > --}}
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <select  id="select2-1" class="form-control custom-select">
                                <option selected disabled>Kategori Bidang Pekerjaan</option>
                                @foreach ($katagori as $count => $oyeach)
                                    <option value="{{ $oyeach->id }}"> <a href="{{  }}"> </a>{{ $oyeach->bidang_pekerjaan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                            <form action="{{ URL::current() }}" method="GET">
                                <button type="submit" class="btn btn-primary btn-block" style="height:35px; padding-top:5px">Search</button>
                                {{-- <button type="submit" name="cari" value="{{ request('cari') }}" class="btn btn-primary btn-block" style="height:35px; padding-top:5px">Search</button> --}}
                            </form>
                    </div>
                </div>
            {{-- </form> --}}
            <div class="row">

                @forelse ($loker as $lok )
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-4">
                        <div class="media-1">
                            <div class="card">
                                <div class="card-header text-center">
                                    <b>DIBUTUHKAN</b>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h3>{{ \Illuminate\Support\Str::limit($lok->judul, 22, $end = '...') }}</h3>
                                        </div>
                                    </div>
                                    {{-- <a href="#" class="d-block mb-3"><img src="{{ asset('assets') }}/frontend/images/hero-slider-3.jpg" alt="Image" class="img-fluid"></a> --}}
                                    <a href="#" class="d-block mb-3"><img src="{{ asset($lok->perusahaan['logo']) }}" alt="Image" class="img-fluid"></a>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h3>{{ $lok->perusahaan['nama_perusahaan'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </td>
                                                    <td>
                                                        {{ \Illuminate\Support\Str::limit($lok->perusahaan['alamat'], 20, $end = '...') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </td>
                                                    <td>
                                                        {{ $lok->pendidikan_min }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-business-time"></i>
                                                    </td>
                                                    <td>
                                                        {{ $lok->status_kerja }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="center">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="center">
                <a href="#" class="btn btn-primary" style="text-transform: uppercase">
                    lowongan lainnya
                </a>
            </div>
                {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    {{ $loker->links() }}  
                </div> --}}
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets') }}/backend/assets/js/select2.min.js"></script>
    <script>
        $('#select2').select2({
            theme: "bootstrap4"
        });
        $('#select2-1').select2({
            theme: "bootstrap4"
        });
    </script>
@endpush


{{-- @foreach ($katagori as $oyeach)
<option value="{{ $oyeach->id }}">{{ $oyeach->bidang_pekerjaan }}</option>
@endforeach --}}

                {{-- @forelse ($loker as $lok )
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-4">
                        <div class="media-1">
                            <div class="card">
                                <div class="card-header text-center">
                                    <b>DIBUTUHKAN</b>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h3>{{ \Illuminate\Support\Str::limit($lok->judul, 22, $end = '...') }}</h3>
                                        </div>
                                    </div>
                                    <a href="#" class="d-block mb-3"><img src="{{ asset($lok->perusahaan['logo']) }}" alt="Image" class="img-fluid"></a>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h3>{{ $lok->perusahaan['nama_perusahaan'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </td>
                                                    <td>
                                                        {{ \Illuminate\Support\Str::limit($lok->perusahaan['alamat'], 20, $end = '...') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </td>
                                                    <td>
                                                        {{ $lok->pendidikan_min }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-business-time"></i>
                                                    </td>
                                                    <td>
                                                        {{ $lok->status_kerja }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="center">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse --}}