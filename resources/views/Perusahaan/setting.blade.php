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
                                    <h5>&nbsp;Edit Profile Perusahaan</h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('saveprofil') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Logo Perusahaan</label>
                                            <div class="controls">
                                                <input type="file" name="logo" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Nama Perusahaan</label>
                                            <div class="controls">
                                                <input type="text" name="nama_perusahaan" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Nama Perusahaan"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Alamat</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="alamat" class="span6"></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Kontak</label>
                                            <div class="controls">
                                                <input type="number" name="kontak" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Kontak Perusahaan"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Maps Location</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="location" class="span6"></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Tentang Perusahaan</label>
                                            <div class="controls">
                                                <textarea id="about" name="about" class="span6 ckeditor"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            SAVE & PUBLISH
                                        </button>
                                    </form>
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
