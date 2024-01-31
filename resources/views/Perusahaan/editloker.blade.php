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
                                    <h5>&nbsp;Edit Lowongan Kerja</h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('updateloker', $data->id) }}">
                                        @csrf
                                        @method('PUT')
                                        @if ($company != null)
                                            <input type="hidden" name="company_id" value="{{ $company->id }}">
                                        @endif
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="control-group">
                                            <label for="text1" class="control-label">Judul Lowongan</label>
                                            <div class="controls with-tooltip">
                                                <input type="text" name="judul" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom"
                                                    value="{{ $data->judul }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Deskripsi</label>
                                            <div class="controls">
                                                <textarea name="deskripsi" id="autosize" class="span6">{{ $data->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Katagori Pekerjaan</label>
                                            <div class="controls">
                                                <select class="chzn-select span6 select2" tabindex="2" data-placeholder="Pilih Katagori" 
                                                    name="katagori_pekerjaan_id" id="katagori_pekerjaan_id">
                                                    <option selected disabled>Pilih Kategori </option>
                                                    @foreach ($katagori_pekerjaan as $item)
                                                        <option {{ $data->katagori_pekerjaan_id == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->bidang_pekerjaan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Lokasi Pekerjaan</label>
                                            <div class="controls">
                                                <select data-placeholder="Pilih Lokasi" name="lokasi"
                                                    class="chzn-select span6 select2" tabindex="2">
                                                    <option selected disabled>Pilih Lokasi</option>
                                                    @foreach ($kota as $item)
                                                        <option {{ $data->lokasi == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status Pekerjaan</label>
                                            <div class="controls">
                                                <label>
                                                    <input class="uniform" name="status_kerja" type="checkbox"
                                                        {{ $data->status_kerja == 'Full Time' ? 'checked' : '' }}
                                                        value="Full Time">
                                                    Full Time
                                                </label>
                                                <label>
                                                    <input class="uniform" name="status_kerja" type="checkbox"
                                                        {{ $data->status_kerja == 'Part Time' ? 'checked' : '' }}
                                                        value="Part Time">
                                                    Part Time
                                                </label>
                                                <label>
                                                    <input class="uniform" name="status_kerja" type="checkbox"
                                                        {{ $data->status_kerja == 'Freelance' ? 'checked' : '' }}
                                                        value="Freelance">
                                                    Freelance
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Pendidikan</label>
                                            <div class="controls controls-row">
                                                <select class="span3 autotab" name="pendidikan_min" tabindex="14">
                                                    <option selected disabled>Tingkat Pendidikan</option>
                                                    <option {{ $data->pendidikan_min == 'SMK' ? 'selected' : '' }}
                                                        value="SMK">SMK</option>
                                                    <option {{ $data->pendidikan_min == 'S1' ? 'selected' : '' }}
                                                        value="S1">S1</option>
                                                    <option {{ $data->pendidikan_min == 'D3' ? 'selected' : '' }}
                                                        value="D3">D3</option>
                                                </select>
                                                <select class="span3 autotab" name="jurusan" tabindex="15">
                                                    <option selected disabled>Jurusan</option>
                                                    <option {{ $data->jurusan == 'Sistem Informasi' ? 'selected' : '' }}
                                                        value="Sistem Informasi">Sistem Informasi</option>
                                                    <option {{ $data->jurusan == 'Teknik Komputer' ? 'selected' : '' }}
                                                        value="Teknik Komputer">Teknik Komputer</option>
                                                    <option {{ $data->jurusan == 'Manajemen' ? 'selected' : '' }}
                                                        value="Manajemen">Manajemen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Masa Berlaku Lowongan</label>
                                            <div class="controls controls-row">
                                                <input type="date" name="tgl_mulai" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom"
                                                    value="{{ $data->tgl_mulai }}" />
                                                <label class="control-label"
                                                    style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                <input type="date" name="tgl_akhir" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom"
                                                    value="{{ $data->tgl_akhir }}" />
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <div class="box">
                                                    <header>
                                                        <h5>&nbsp;Assesment Score</h5>
                                                    </header>
                                                    <div class="body">
                                                        <div class="control-group">
                                                            <label class="control-label">Score</label>
                                                            <div class="controls controls-row">
                                                                <select class="span4 autotab" name="skor"
                                                                    tabindex="14">
                                                                    <option selected disabled>Pilih Skor</option>
                                                                    <option {{ $data->skor == '1' ? 'selected' : '' }}
                                                                        value="1">1 (LOW)</option>
                                                                    <option {{ $data->skor == '2' ? 'selected' : '' }}
                                                                        value="2">2 (LOW)</option>
                                                                    <option {{ $data->skor == '3' ? 'selected' : '' }}
                                                                        value="3">3 (LOW)</option>
                                                                    <option {{ $data->skor == '4' ? 'selected' : '' }}
                                                                        value="4">4 (LOW)</option>
                                                                    <option {{ $data->skor == '5' ? 'selected' : '' }}
                                                                        value="5">5 (LOW)</option>
                                                                    <option {{ $data->skor == '6' ? 'selected' : '' }}
                                                                        value="6">6 (LOW)</option>
                                                                    <option {{ $data->skor == '7' ? 'selected' : '' }}
                                                                        value="7">7 (LOW)</option>
                                                                    <option {{ $data->skor == '8' ? 'selected' : '' }}
                                                                        value="8">8 (LOW)</option>
                                                                    <option {{ $data->skor == '9' ? 'selected' : '' }}
                                                                        value="9">9 (LOW)</option>
                                                                    <option {{ $data->skor == '10' ? 'selected' : '' }}
                                                                        value="10">10 (LOW)</option>
                                                                    <option {{ $data->skor == '11' ? 'selected' : '' }}
                                                                        value="11">11 (MEDIUM)</option>
                                                                    <option {{ $data->skor == '12' ? 'selected' : '' }}
                                                                        value="12">12 (MEDIUM)</option>
                                                                    <option {{ $data->skor == '13' ? 'selected' : '' }}
                                                                        value="13">13 (MEDIUM)</option>
                                                                    <option {{ $data->skor == '14' ? 'selected' : '' }}
                                                                        value="14">14 (MEDIUM)</option>
                                                                    <option {{ $data->skor == '15' ? 'selected' : '' }}
                                                                        value="15">15 (GOOD)</option>
                                                                    <option {{ $data->skor == '16' ? 'selected' : '' }}
                                                                        value="16">16 (GOOD)</option>
                                                                    <option {{ $data->skor == '17' ? 'selected' : '' }}
                                                                        value="17">17 (GOOD)</option>
                                                                    <option {{ $data->skor == '18' ? 'selected' : '' }}
                                                                        value="18">18 (GOOD)</option>
                                                                    <option {{ $data->skor == '19' ? 'selected' : '' }}
                                                                        value="19">19 (GOOD)</option>
                                                                    <option {{ $data->skor == '20' ? 'selected' : '' }}
                                                                        value="20">20 (GOOD)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

@push('script')
    <script src="{{ asset('assets') }}/backend/assets/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush
