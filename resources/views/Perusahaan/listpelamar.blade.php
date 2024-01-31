@extends('layouts.backend.master')

@section('title', 'Home | Perusahaan')

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
                                    <h5>&nbsp;Daftar Pelamar Kerja</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table id="dataTable"
                                        class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Pelamar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                                @php
                                                    $value = App\Pencaker::where('id', $item->pencaker_id)->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $value->nama_lengkap }}</td>
                                                    <td>
                                                        <a href="{{ route('pelamar', $value->id) }}" class="btn edit"
                                                            style="text-transform: uppercase"><i class="icon-file"></i>
                                                            lihat CV</a>
                                                        <form method="POST" action="{{ route('lanjut', $item->id) }}"
                                                            style="display: inline-block">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-default" data-toggle="confirmation"
                                                                style="text-transform: uppercase">lanjut</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('ditolak', $item->id) }}"
                                                            style="display: inline-block">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-default remove"
                                                                data-toggle="confirmation"
                                                                style="text-transform: uppercase">Ditolak</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('diterima', $item->id) }}"
                                                            style="display: inline-block">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-default" data-toggle="confirmation"
                                                                style="text-transform: uppercase">Diterima</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" style="text-align: center">
                                                        <i><b>Belum ada pelamar!</b></i>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
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
