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
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <h4>&nbsp;Lamaran Kerja</h4>
                                        </div>
                                        <div class="span6">
                                            <h4>&nbsp;Status Proses</h4>
                                        </div>
                                    </div>
                                </header>
                                @forelse ($apply as $item)
                                    @php
                                        $data = App\Perusahaan::with('loker')
                                            ->where('id', $item->company_id)
                                            ->get();
                                        foreach ($data as $com) {
                                            foreach ($com->loker as $loker) {
                                            }
                                        }
                                    @endphp
                                    <div class="body">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4 style="margin-top: 0">{{ $loker->judul }}</h4>
                                                <h5>{{ $com->nama_perusahaan }}</h5>
                                            </div>
                                            <div class="span6">
                                                @if ($item->status == 'proses')
                                                    <div class="btn-group">
                                                        <span class="label label-warning"
                                                            style="text-transform: uppercase">Proses
                                                            Verifikasi</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Lanjut</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Ditolak</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Diterima</span>
                                                    </div>
                                                @elseif ($item->status == 'lanjut')
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Proses
                                                            Verifikasi</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-warning"
                                                            style="text-transform: uppercase">Lanjut</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Ditolak</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Diterima</span>
                                                    </div>
                                                @elseif ($item->status == 'ditolak')
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Proses
                                                            Verifikasi</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Lanjut</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-warning"
                                                            style="text-transform: uppercase">Ditolak</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Diterima</span>
                                                    </div>
                                                @elseif ($item->status == 'diterima')
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Proses
                                                            Verifikasi</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Lanjut</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-default"
                                                            style="text-transform: uppercase">Ditolak</span>
                                                    </div>
                                                    <div class="btn-group">
                                                        <span class="label label-warning"
                                                            style="text-transform: uppercase">Diterima</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="body text-center">
                                        <p><i>Belum ada riwayat!</i></p>
                                    </div>
                                @endforelse
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
