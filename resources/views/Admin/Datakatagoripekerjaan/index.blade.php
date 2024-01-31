@extends('layouts.backend.master')

@section('title', 'Home | Admin')

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
                                    <h5>&nbsp;Data Katagori Pekerjaan</h5>
                                    <div class="toolbar">
                                            <a href="{{ route('datakatagoripekerjaan.create') }}" rel="tooltip" data-placement="bottom"
                                                class="btn btn-defualt">
                                                <i class="fas fa-edit"></i> Tambah Data Katagori Pekerjaan
                                            </a>
                                    </div>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th style="text-align: center">Nama Katagori Pekerjaan</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->bidang_pekerjaan }}</td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('datakatagoripekerjaan.edit', $item->id) }}" class="btn edit"><i
                                                            class="icon-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('datakatagoripekerjaan.destroy', $item->id) }}" method="POST"
                                                            onsubmit="return confirm('Hapus Data, Anda Yakin ?')"
                                                            style="display: inline-block">
                                                            {!! method_field('delete') . csrf_field() !!}
                                                            <button class="dropdown-item" type="submit">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" style="text-align: center"><i>Katagori Pekerjaan Masih Kosong
                                                            !</i>
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
