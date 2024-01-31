@extends('layouts.backend.master')

@section('title', 'Home | Pencari Kerja')

@section('style')
    <style>
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .add-more1 {
                float: inline;
                margin-top: 10px;
            }

            .remove1 {
                float: inline;
                margin-top: 10px;
            }

            .add-more2 {
                float: inline;
                margin-top: 10px;
            }

            .remove2 {
                float: inline;
                margin-top: 10px;
            }

            .add-more3 {
                float: inline;
                margin-top: 10px;
            }

            .remove3 {
                float: inline;
                margin-top: 10px;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .add-more1 {
                float: inline;
            }

            .remove1 {
                float: inline;
            }

            .add-more2 {
                float: inline;
            }

            .remove2 {
                float: inline;
            }

            .add-more3 {
                float: inline;
            }

            .remove3 {
                float: inline;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .add-more1 {
                float: inline;
            }

            .remove1 {
                float: inline;
            }

            .add-more2 {
                float: inline;
            }

            .remove2 {
                float: inline;
            }

            .add-more3 {
                float: inline;
            }

            .remove3 {
                float: inline;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .add-more1 {
                float: inline;
            }

            .remove1 {
                float: inline;
            }

            .add-more2 {
                float: inline;
            }

            .remove2 {
                float: inline;
            }

            .add-more3 {
                float: inline;
            }

            .remove3 {
                float: inline;
            }
        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .add-more1 {
                float: inline;
            }

            .remove1 {
                float: inline;
            }

            .add-more12 {
                float: inline;
            }

            .remove2 {
                float: inline;
            }

            .add-more3 {
                float: inline;
            }

            .remove3 {
                float: inline;
            }
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
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('savecv') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Foto Profile</label>
                                            <div class="controls">
                                                <input type="file" name="foto" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Foto Profile"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Nama Lengkap</label>
                                            <div class="controls">
                                                <input type="text" name="nama_lengkap" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Nama Lengkap"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Tempat Lahir</label>
                                            <div class="controls">
                                                <input type="text" name="tmpt_lahir" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Tempat Lahir"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Tanggal Lahir</label>
                                            <div class="controls">
                                                <input type="date" name="tgl_lahir" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Tanggal Lahir"
                                                    data-placement="bottom" />
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
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Akun Facebook</label>
                                            <div class="controls">
                                                <input type="text" name="fb" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Facebook"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Akun LinkedIn</label>
                                            <div class="controls">
                                                <input type="text" name="linkedin" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan LinkedIn"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Nomor Telepon</label>
                                            <div class="controls">
                                                <input type="number" name="no_hp" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Nomor Telepon"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Deskripsi Singkat</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="about" class="span6 ckeditor"></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Keahlian</h4>
                                        <div class="text-dark1 after-add-more1">
                                            <div class="control-group">
                                                <div class="controls controls-row">
                                                    <input type="text" name="keahlian[]" id="text1"
                                                        class="span3 input-tooltip"
                                                        data-original-title="Masukkan Keahlian" data-placement="bottom"
                                                        placeholder="Keahlian" />
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
                                                    <a class="btn btn-success add-more1"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>Pendidikan</h4>
                                        <div class="text-dark2 after-add-more2">
                                            <div class="control-group">
                                                <div class="controls controls-row">
                                                    <input type="text" name="nama_sekolah[]" id="text1"
                                                        class="span3 input-tooltip"
                                                        data-original-title="Masukkan Nama Sekolah"
                                                        data-placement="bottom" placeholder="Nama Sekolah" />
                                                    <label class="control-label"
                                                        style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                    <input type="number" name="angkatan[]" id="text1"
                                                        class="span3 input-tooltip"
                                                        data-original-title="Masukkan Tahun Angkatan"
                                                        data-placement="bottom" placeholder="Tahun Angkatan" />
                                                    <label class="control-label"
                                                        style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                    <input type="text" name="jurusan[]" id="text1"
                                                        class="span3 input-tooltip" data-original-title="Masukkan Jurusan"
                                                        data-placement="bottom" placeholder="Jurusan" />
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
                                                    <input type="text" name="nama_perusahaan[]" id="text1"
                                                        class="span3 input-tooltip"
                                                        data-original-title="Masukkan Nama Perusahaan"
                                                        data-placement="bottom" placeholder="Nama Perusahaan" />
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
                                                        data-original-title="Masukkan Tanggal Masuk"
                                                        data-placement="bottom" placeholder="Tanggal Masuk" />
                                                    <label class="control-label"
                                                        style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                    <input type="date" name="tgl_akhir[]" id="text1"
                                                        class="span3 input-tooltip"
                                                        data-original-title="Masukkan Tanggal Selesai"
                                                        data-placement="bottom" placeholder="Tanggal Selesai" />
                                                    &nbsp;&nbsp;
                                                    <a class="btn btn-success add-more3"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>Personal Assesment<i> (Wajib)</i></h4>
                                        <b>1. Apa yang anda lakukan ketika melihat situasi atau
                                            lingkungan
                                            sekitar melanggar norma, aturan,
                                            nilai
                                            dan kode etik?</b>
                                        <label class="radio">
                                            <input type="radio" name="soal1[]" id="soal1A" value="1">
                                            Bertindak sesuai nilai, norma, etika organisasi
                                            dalam
                                            kapasitas pribadi
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal1[]" id="soal1B" value="2">
                                            Mengingatkan dan mengajak rekan kerja untuk
                                            bertindak
                                            sesuai nilai, norma, dan etika
                                            organisasi
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal1[]" id="soal1C" value="3">
                                            Memastikan, menanamkan keyakinan bersama agar rekan
                                            kerja bertindak sesuai nilai, norma,
                                            dan
                                            etika organisasi
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal1[]" id="soal1D" value="4">
                                            Menciptakan situasi kerja yang mendorong kepatuhan
                                            pada
                                            nilai, norma, dan etika
                                            organisasi.
                                        </label>
                                        <br>
                                        <b>2. Apa yang anda lakukan, untuk mendorong kerjasama dalam
                                            wilayah anda?</b>
                                        <label class="radio">
                                            <input type="radio" name="soal2[]" id="soal2A" value="1">
                                            Berpartisipasi dalam kelompok kerja
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal2[]" id="soal2B" value="2">
                                            Menumbuhkan tim kerja yang partisipatif dan efektif
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal2[]" id="soal2C" value="3">
                                            Efektif membangun tim kerja untuk peningkatan
                                            kinerja
                                            organisasi.
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal2[]" id="soal2D" value="4">
                                            Membangun komitmen tim, sinergi.
                                        </label>
                                        <br>
                                        <b>3. Bagaimana strategi komunikasi Anda untuk membuat orang
                                            lain
                                            paham dan yakin dengan yang anda
                                            sampaikan?</b>
                                        <label class="radio">
                                            <input type="radio" name="soal3[]" id="soal3A" value="1">
                                            Menyampaikan informasi dengan jelas, lengkap,
                                            pemahaman
                                            yang sama.
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal3[]" id="soal3B" value="2">
                                            Aktif menjalankan komunikasi secara formal dan
                                            informal,
                                            bersedia mendengarkan orang
                                            lain
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal3[]" id="soal3C" value="3">
                                            Berkomunikasi secara asertif, terampil berkomunikasi
                                            lisan/ tertulis untuk menyampaikan
                                            informasi yang sensitif/ rumit/ kompleks.
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal3[]" id="soal3D" value="4">
                                            Mampu mengemukakan pemikiran multidimensi secara
                                            lisan
                                            dan tertulis untuk mendorong
                                            kesepakatan
                                            meningkatkan kinerja secara keseluruhan
                                        </label>
                                        <br>
                                        <b>4. Apa yang anda lakukan dalam mencapai target kerja?</b>
                                        <label class="radio">
                                            <input type="radio" name="soal4[]" id="soal4A" value="1">
                                            Bertanggung jawab untuk memenuhi standar kerja.
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal4[]" id="soal4B" value="2">
                                            Berupaya meningkatkan hasil kerja pribadi lebih
                                            tinggi
                                            dari standar yang ditetapkan,
                                            mencoba metode alternatif untuk peningkatan kinerja
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal4[]" id="soal4C" value="3">
                                            Menetapkan target kerja yang menantang bagi unit
                                            kerja,
                                            memberi apresiasi pada rekan
                                            kerja untuk mendorong kinerja.
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal4[]" id="soal4D" value="4">
                                            Mendorong unit kerja mencapai target yang ditetapkan
                                            atau melebihi hasil kerja
                                            sebelumnya.
                                        </label>
                                        <br>
                                        <b>5. Apa yang anda lakukan untuk mencari solusi penyelesaian
                                            dari
                                            sebuah permasalahan?</b>
                                        <label class="radio">
                                            <input type="radio" name="soal5[]" id="soal5A" value="1">
                                            Mengumpulkan informasi untuk bertindak sesuai
                                            kewenangan
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal5[]" id="soal5B" value="2">
                                            Menganalisis masalah secara mendalam
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal5[]" id="soal5C" value="3">
                                            Membandingkan berbagai alternatif, menyeimbangkan
                                            risiko
                                            keberhasilan dalam implementasi
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="soal5[]" id="soal5D" value="4">
                                            Menyelesaikan masalah yang mengandung risiko tinggi,
                                            mengantisipasi dampak keputusan,
                                            membuat tindakan pengamanan/mitigasi risiko
                                        </label>
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
    <script src="{{ asset('assets') }}/backend/assets/js/multiple-form.js"></script>
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
