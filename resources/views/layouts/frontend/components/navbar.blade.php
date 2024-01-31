<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <a href="{{ route('welcome') }}" class="logo m-0"><img
                    src="{{ asset('assets') }}/backend/assets/img/JobSentra.png" alt=""
                    style="max-width: 200px"></a>

            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                <li><a href="{{ route('assesment') }}">Assesment</a></li>
                <li><a href="{{ route('pelatihan') }}">Pelatihan</a></li>
                <li><a href="{{ route('register.member') }}">Pencaker</a></li>
                <li><a href="{{ route('register.company') }}">Buka Lowongan</a></li>
                <li><a href="{{ route('login') }}" class="btn btn-outline-warning btn-md font-weight-bold"
                        style="width: 150px">Login</a>
                </li>
            </ul>

            <a href="#"
                class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>

        </div>
    </div>
</nav>
