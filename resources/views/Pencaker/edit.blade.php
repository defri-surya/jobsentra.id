@extends('layouts.backend.master')

@section('title', 'Home | Pencari Kerja')

@section('style')
    <style>
        .radio {
            margin-left: 13px;
        }
    </style>
@endsection

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
                                    <h5>&nbsp;Edit CV</h5>
                                </header>
                                {{-- {{ dd($data->foto) }} --}}
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('updatecv', $data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Foto Profile</label>
                                            <div class="controls">
                                                <input type="file" name="foto" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Foto Profile"
                                                    data-placement="bottom" />
                                                <img width="150" src="{{ asset($data->foto) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Nama Lengkap</label>
                                            <div class="controls">
                                                <input type="text" name="nama_lengkap" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Nama Lengkap"
                                                    data-placement="bottom" value="{{ $data->nama_lengkap }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Tempat Lahir</label>
                                            <div class="controls">
                                                <input type="text" name="tmpt_lahir" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Tempat Lahir"
                                                    data-placement="bottom" value="{{ $data->tmpt_lahir }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Tanggal Lahir</label>
                                            <div class="controls">
                                                <input type="date" name="tgl_lahir" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Tanggal Lahir"
                                                    data-placement="bottom" value="{{ $data->tgl_lahir }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Alamat Email</label>
                                            <div class="controls">
                                                <input type="text" name="email" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Tempat Lahir"
                                                    data-placement="bottom" value="{{ auth()->user()->email }}" readonly />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Akun Instagram</label>
                                            <div class="controls">
                                                <input type="text" name="ig" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Username Instagram"
                                                    data-placement="bottom" value="{{ $data->ig }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Akun Facebook</label>
                                            <div class="controls">
                                                <input type="text" name="fb" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Facebook"
                                                    data-placement="bottom" value="{{ $data->fb }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Akun LinkedIn</label>
                                            <div class="controls">
                                                <input type="text" name="linkedin" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan LinkedIn"
                                                    data-placement="bottom" value="{{ $data->linkedin }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Nomor Telepon</label>
                                            <div class="controls">
                                                <input type="number" name="no_hp" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Nomor Telepon" data-placement="bottom"
                                                    value="{{ $data->no_hp }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Deskripsi Singkat</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="about" class="span6 ckeditor">{{ $data->about }}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Keahlian</h4>
                                        <div class="text-dark1 after-add-more1">
                                            <div class="control-group">
                                                <div class="controls controls-row">
                                                    @foreach ($data->skill as $item)
                                                        <div class="controls-row" style="margin-bottom: 10px">
                                                            <input type="text" name="keahlian" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Keahlian"
                                                                data-placement="bottom" placeholder="Keahlian"
                                                                value="{{ $item['keahlian'] }}" />
                                                            <label class="control-label"
                                                                style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                            <select class="span3 autotab" name="grade" tabindex="14">
                                                                <option selected disabled>-- Pilih Grade --</option>
                                                                <option {{ $item->grade == 'LOW' ? 'selected' : '' }}
                                                                    value="LOW">LOW</option>
                                                                <option {{ $item->grade == 'MEDIUM' ? 'selected' : '' }}
                                                                    value="MEDIUM">MEDIUM</option>
                                                                <option {{ $item->grade == 'GOOD' ? 'selected' : '' }}
                                                                    value="GOOD">GOOD</option>
                                                                <option {{ $item->grade == 'VERY GOOD' ? 'selected' : '' }}
                                                                    value="VERY GOOD">VERY GOOD</option>
                                                                <option {{ $item->grade == 'EXPERT' ? 'selected' : '' }}
                                                                    value="EXPERT">EXPERT</option>
                                                            </select>
                                                            &nbsp;&nbsp;
                                                            <a class="btn btn-danger remove1"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    @endforeach
                                                    &nbsp;&nbsp;
                                                    <a class="btn btn-success add-more1"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>Pendidikan</h4>
                                        <div class="text-dark2 after-add-more2">
                                            <div class="control-group">
                                                <div class="controls controls-row">
                                                    @foreach ($data->pendidikan as $value)
                                                        <div class="controls-row" style="margin-bottom: 10px">
                                                            <input type="text" name="nama_sekolah" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Nama Sekolah"
                                                                data-placement="bottom" placeholder="Nama Sekolah"
                                                                value="{{ $value['nama_sekolah'] }}" />
                                                            <label class="control-label"
                                                                style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                            <input type="number" name="angkatan" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Tahun Angkatan"
                                                                data-placement="bottom" placeholder="Tahun Angkatan"
                                                                value="{{ $value['angkatan'] }}" />
                                                            <label class="control-label"
                                                                style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                            <input type="text" name="jurusan" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Jurusan"
                                                                data-placement="bottom" placeholder="Jurusan"
                                                                value="{{ $value['jurusan'] }}" />
                                                            &nbsp;&nbsp;
                                                            <a class="btn btn-danger remove2"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    @endforeach
                                                    &nbsp;&nbsp;
                                                    <a class="btn btn-success add-more2"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>Pengalaman Kerja</h4>
                                        <div class="text-dark3 after-add-more3">
                                            <div class="control-group">
                                                <div class="controls controls-row">
                                                    @foreach ($data->pengalaman as $result)
                                                        <div class="controls-row" style="margin-bottom: 10px">
                                                            <input type="text" name="nama_perusahaan" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Nama Perusahaan"
                                                                data-placement="bottom" placeholder="Nama Perusahaan"
                                                                value="{{ $result['nama_perusahaan'] }}" />
                                                            <label class="control-label"
                                                                style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                            <input type="text" name="posisi" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Posisi"
                                                                data-placement="bottom" placeholder="Posisi"
                                                                value="{{ $result['posisi'] }}" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls controls-row">
                                                    @foreach ($data->pengalaman as $result)
                                                        <div class="controls-row" style="margin-bottom: 10px">
                                                            <input type="date" name="tgl_mulai" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Tanggal Masuk"
                                                                data-placement="bottom" placeholder="Tanggal Masuk"
                                                                value="{{ $result['tgl_mulai'] }}" />
                                                            <label class="control-label"
                                                                style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                            <input type="date" name="tgl_akhir" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Tanggal Selesai"
                                                                data-placement="bottom" placeholder="Tanggal Selesai"
                                                                value="{{ $result['tgl_akhir'] }}" />
                                                            &nbsp;&nbsp;
                                                            <a class="btn btn-danger remove2"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    @endforeach
                                                    &nbsp;&nbsp;
                                                    <a class="btn btn-success add-more3"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            SAVE & PUBLISH
                                        </button>
                                    </form>
                                </div>
                                <div class="copy1 invisible" hidden>
                                    <div class="text-dark1">
                                        <div class="control-group">
                                            <div class="controls controls-row">
                                                <input type="text" name="keahlian[]" id="text1"
                                                    class="span3 input-tooltip" data-original-title="Masukkan Keahlian"
                                                    data-placement="bottom" placeholder="Keahlian" />
                                                <label class="control-label"
                                                    style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                <select class="span3 autotab" name="grade[]" tabindex="14">
                                                    <option selected disabled>-- Pilih Grade --</option>
                                                    <option value="LOW">LOW</option>
                                                    <option value="MEDIUM">MEDIUM</option>
                                                    <option value="GOOD">GOOD</option>
                                                    <option value="VERY GOOD">VERY GOOD</option>
                                                    <option value="EXPERT">EXPERT</option>
                                                </select>
                                                &nbsp;&nbsp;
                                                <a class="btn btn-danger remove1"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="copy2 invisible" hidden>
                                    <div class="text-dark2">
                                        <div class="control-group">
                                            <div class="controls controls-row">
                                                <input type="text" name="nama_sekolah[]" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Nama Sekolah" data-placement="bottom"
                                                    placeholder="Nama Sekolah" />
                                                <label class="control-label"
                                                    style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                <input type="number" name="angkatan[]" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Tahun Angkatan" data-placement="bottom"
                                                    placeholder="Tahun Angkatan" />
                                                <label class="control-label"
                                                    style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                <input type="text" name="jurusan[]" id="text1"
                                                    class="span3 input-tooltip" data-original-title="Masukkan Jurusan"
                                                    data-placement="bottom" placeholder="Jurusan" />
                                                &nbsp;&nbsp;
                                                <a class="btn btn-danger remove2"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="copy3 invisible" hidden>
                                    <div class="text-dark3">
                                        <div class="control-group">
                                            <div class="controls controls-row">
                                                <input type="text" name="nama_perusahaan[]" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Nama Perusahaan" data-placement="bottom"
                                                    placeholder="Nama Perusahaan" />
                                                <label class="control-label"
                                                    style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                <input type="text" name="posisi[]" id="text1"
                                                    class="span3 input-tooltip" data-original-title="Masukkan Posisi"
                                                    data-placement="bottom" placeholder="Posisi" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls controls-row">
                                                <input type="date" name="tgl_mulai[]" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Tanggal Masuk" data-placement="bottom"
                                                    placeholder="Tanggal Masuk" />
                                                <label class="control-label"
                                                    style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                <input type="date" name="tgl_akhir[]" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Tanggal Selesai" data-placement="bottom"
                                                    placeholder="Tanggal Selesai" />
                                                &nbsp;&nbsp;
                                                <a class="btn btn-danger remove3"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
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
@endsection

@push('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more1").click(function() {
                var html = $(".copy1").html();
                $(".after-add-more1").after(html);
            });
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove1", function() {
                $(this).parents(".text-dark1").remove();
            });
        });

        $(document).ready(function() {
            $(".add-more2").click(function() {
                var html = $(".copy2").html();
                $(".after-add-more2").after(html);
            });
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove2", function() {
                $(this).parents(".text-dark2").remove();
            });
        });

        $(document).ready(function() {
            $(".add-more3").click(function() {
                var html = $(".copy3").html();
                $(".after-add-more3").after(html);
            });
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove3", function() {
                $(this).parents(".text-dark3").remove();
            });
        });
    </script>
@endpush
