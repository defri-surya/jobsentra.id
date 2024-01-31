<!-- BEGIN TOP BAR -->
<div id="top">
    <!-- .navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="navbar-inner">
            <div class="container-fluid" style="background-color: #FF8C00">
                <a class="brand" href="#">
                    <img src="{{ asset('assets') }}/backend/assets/img/JobSentra.png" alt=""
                        style="max-width: 200px">
                </a>
                <!-- .topnav -->
                <div class="btn-toolbar topnav">
                    <div class="btn-group">
                        <a class="btn btn-inverse" data-placement="bottom" data-original-title="Logout" rel="tooltip"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                class="icon-off"></i></a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <!-- /.topnav -->
            </div>
        </div>
    </div>
    <!-- /.navbar -->
</div>
<!-- END TOP BAR -->
