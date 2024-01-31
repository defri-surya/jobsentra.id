<!-- BEGIN LEFT  -->
<div id="left">
    <!-- .user-media -->
    @php
        $data = App\Perusahaan::where('user_id', auth()->user()->id)->first();
        $pencaker = App\Pencaker::where('user_id', auth()->user()->id)->first();
        $loker = App\Perusahaan::where('user_id', auth()->user()->id)->first();
    @endphp
    @can('isAdmin')
        <div class="media user-media hidden-phone">
            @if ($data == null)
                <img src="{{ asset('assets') }}/backend/assets/img/user.gif" alt=""
                    class="media-object img-polaroid user-img">
            @else
                <img src="{{ asset($data->logo) }}" alt="" class="media-object img-polaroid user-img">
            @endif
            {{-- <img src="{{ asset($data->logo) }}" alt="" class="media-object img-polaroid user-img"> --}}

            <div class="media-body hidden-tablet">
                <h5 class="media-heading">
                    @if ($data == null)
                        {{ auth()->user()->name }}
                    @else
                        {{ $data->nama_perusahaan }}
                    @endif
                </h5>
            </div>

        </div>
    @endcan
    @can('isCompany')
        <div class="media user-media hidden-phone">
            @if ($data == null)
                <img src="{{ asset('assets') }}/backend/assets/img/user.gif" alt=""
                    class="media-object img-polaroid user-img">
            @else
                <img src="{{ asset($data->logo) }}" alt="" class="media-object img-polaroid user-img">
            @endif
            {{-- <img src="{{ asset($data->logo) }}" alt="" class="media-object img-polaroid user-img"> --}}

            <div class="media-body hidden-tablet">
                <h5 class="media-heading">
                    @if ($data == null)
                        {{ auth()->user()->name }}
                    @else
                        {{ $data->nama_perusahaan }}
                    @endif
                </h5>
            </div>
        </div>
    @endcan
    @can('isMember')
        <div class="media user-media hidden-phone">
            @if ($pencaker == null)
                <img src="{{ asset('assets') }}/backend/assets/img/user.gif" alt=""
                    class="media-object img-polaroid user-img">
            @else
                <img src="{{ asset($pencaker->foto) }}" alt="" class="media-object img-polaroid user-img">
            @endif

            <div class="media-body hidden-tablet">
                <h5 class="media-heading">
                    @if ($pencaker == null)
                        {{ auth()->user()->name }}
                    @else
                        {{ $pencaker->nama_lengkap }}
                    @endif
                </h5>
            </div>
        </div>
    @endcan
    <!-- /.user-media -->

    <!-- BEGIN MAIN NAVIGATION -->
    <ul id="menu" class="unstyled accordion collapse in">
        <li class="accordion-group @if (Request::segment(1) == 'home') active @endif">
            <a href="{{ route('home') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                data-target="#dashboard-nav">
                <i class="icon-dashboard icon-home"></i> Home
            </a>
        </li>
        @can('isMember')
            <li class="accordion-group @if (Request::segment(1) == 'infocv') active @endif">
                <a href="{{ route('infocv') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#component-nav">
                    <i class="icon-tasks icon-large"></i> CV Profile
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'lamaranku') active @endif">
                <a href="{{ route('lamaranku') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#component-nav">
                    <i class="icon-tasks icon-large"></i> Lamaranku
                </a>
            </li>
        @endcan
        @can('isCompany')
            <li class="accordion-group @if (Request::segment(1) == 'profilecompany') active @endif">
                <a href="{{ route('profilecompany') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#component-nav">
                    <i class="icon-briefcase icon-large"></i> Profile Perusahaan
                </a>
            </li>
            @if ($loker != null)
                <li class="accordion-group @if (Request::segment(1) == 'buatloker') active @endif">
                    <a href="{{ route('buatloker') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                        data-target="#component-nav">
                        <i class="icon-tasks icon-large"></i> Buat Lowongan
                    </a>
                </li>
            @endif
        @endcan
        @can('isAdmin')
            <li class="accordion-group @if (Request::segment(1) == 'dataperusahaan') active @endif">
                <a href="{{ route('dataperusahaan.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Data Perusahaan
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'datapencaker') active @endif">
                <a href="{{ route('datapencaker.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Data Pencari kerja
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'datalokerfavorit') active @endif">
                <a href="{{ route('datalokerfavorit.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Data Loker Berbayar
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'datakatagoripekerjaan') active @endif">
                <a href="{{ route('datakatagoripekerjaan.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Data Katagori Pekerjaan
                </a>
            </li>
        @endcan
    </ul>
    <!-- END MAIN NAVIGATION -->

</div>
<!-- END LEFT -->
