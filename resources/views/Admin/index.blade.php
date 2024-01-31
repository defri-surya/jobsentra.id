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
                                    <h5>&nbsp;Daftar Partnership</h5>
                                    <div class="toolbar">
                                            <a href="{{ route('partnership.create') }}" rel="tooltip" data-placement="bottom"
                                                class="btn btn-defualt">
                                                <i class="fas fa-edit"></i> Tambah Partnership
                                            </a>
                                    </div>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th style="text-align: center">Link Partnership</th>
                                                <th style="text-align: center">Logo Partnership</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->link }}</td>
                                                    <td style="text-align: center">
                                                        <img width="70" src="{{ asset($item->logo) }}" alt="">
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('partnership.edit', $item->id) }}" class="btn edit"><i
                                                            class="icon-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a href="{{ route('partnership.show', $item->id) }}"
                                                            class="btn btn-default" data-toggle="confirmation"
                                                            style="text-transform: uppercase"><i class="icon-eye-open"></i>
                                                            Detail
                                                        </a>
                                                        <form action="{{ route('partnership.destroy', $item->id) }}" method="POST"
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
                                                    <td colspan="2" style="text-align: center"><i>Partnership Masih Kosong
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
