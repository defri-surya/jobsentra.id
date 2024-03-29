<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>sentrakerja.id</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/backend/assets/img/JobSentra.png">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/login.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/magic/magic.css">

    <style>
        .dropbtn {
            color: #08c;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('assets') }}/backend/assets/img/JobSentra.png" alt="Metis Logo" style="max-width: 350px">
        </div>
        <div class="tab-content">
            <div id="login" class="tab-pane active">
                <form method="POST" action="{{ route('login') }}" class="form-signin">
                    @csrf
                    <p class="muted text-center">
                        Enter your username and password
                    </p>
                    <input type="email" name="email" placeholder="example@mail.com"
                        class="input-block-level @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        style="margin-bottom: 3%">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Email atau Password Salah !</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" placeholder="Password"
                        class="input-block-level @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Email atau Password Salah !</strong>
                        </span>
                    @enderror
                    <button class="btn btn-large btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="text-center">
            <ul class="inline">
                <li><a href="{{ route('password.request') }}">Forgot Password</a></li>
                <li>
                    <div class="dropdown">
                        <span class="dropbtn">Registrasi</span>
                        <div class="dropdown-content">
                            <a href="{{ route('register.member') }}">Pencari Kerja</a>
                            <a href="{{ route('register.company') }}">Perusahaan</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write(
            '<script src="{{ asset('assets') }}/backend/assets/js/vendor/jquery-1.10.1.min.js"><\/script>')
    </script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/vendor/bootstrap.min.js"></script>

    <script>
        $('.inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('magictime swap');
            //set timer to 1 seconds, after that, unload the magic animation
            setTimeout(function() {
                $(activeForm).removeClass('magictime swap');
            }, 1000);
        });
    </script>
</body>

</html>
