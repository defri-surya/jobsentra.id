<!DOCTYPE html>
<html lang="en" moznomarginboxes>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="google" content="notranslate" />
    <!-- Metadata (autofilled by "Save to HTML") -->
    <meta name="author" content="Joe Smith" />
    <meta name="subject" content="A really good software engineer you should hire" />
    <meta name="keywords" content="coding, developing, hacking" />
    <meta name="date" content="2009-04-01" />
    <meta name="generator" content="html-resume-template" />
    <!-- Google Fonts, Normalize, and Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Cardo|Montserrat:300,400,500&amp;subset=latin-ext"
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css"
        integrity="sha256-oSrCnRYXvHG31SBifqP2PM1uje7SJUyX0nTwO2RJV54=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/CV/paper.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/CV/styles.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/CV/typography.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets') }}/CV/screen.css" />
    <link rel="stylesheet" type="text/css" media="print" href="{{ asset('assets') }}/CV/print.css" />
    <title>Print CV</title>
</head>

<body class="letter">
    <section id="save">
        <!-- Document control buttons-->
        <div id="document-controls">
            <button data-action="print" title="Print" onClick="window.print()">Print</button>
        </div>
        <section class="sheet">
            <aside>
                <section class="contact">
                    <h6>Contact</h6>
                    <ul>
                        <li>
                            <p><i class="fa fa-phone" title="Cell phone"></i> {{ $data->no_hp }}</p>
                        </li>
                        <li>
                            <p><i class="fa fa-envelope" title="Email"></i> <a
                                    href="mailto:{{ $data->email }}">{{ $data->email }}</a></p>
                        </li>
                        <li>
                            <p><i class="fab fa-instagram" title="Instagram"></i> {{ $data->ig }}</p>
                        </li>
                        <li>
                            <p><i class="fab fa-facebook-square" title="Facebook"></i> {{ $data->fb }}</p>
                        </li>
                        <li>
                            <p><i class="fab fa-linkedin" title="LinkedIn"></i> {{ $data->linkedin }}</p>
                        </li>
                    </ul>
                </section>
                <section class="skills">
                </section>
                <section class="references">
                </section>
            </aside>
            <section>
                <header class="name" aria-label="Joe Smith">
                    <a href="https://joesmith.site">
                        <svg width="257px" height="35px" viewBox="0 0 257 35" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                font-family="Montserrat-Regular, Montserrat" font-size="48" font-weight="normal">
                                <g id="Letter" transform="translate(-54.000000, -140.000000)" fill="#484848">
                                    <text id="JOE-SMITH">
                                        <tspan x="54.728" y="174">{{ $data->nama_lengkap }}</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <h6>{{ $data->tmpt_lahir }}, {{ date('d/M/Y', strtotime($data->tgl_lahir)) }}</h6>
                    <hr />
                </header>
                <section>
                    <section class="summary">
                        <h6>About Me</h6>
                        <p>{!! $data->about !!}</p>
                    </section>
                    <section class="experience">
                        <h6>Pengalaman Kerja</h6>
                        <ol>
                            @foreach ($data->pengalaman as $pengalaman)
                                <li>
                                    <header>
                                        <p class="sanserif">{{ $pengalaman->nama_perusahaan }}</p>
                                        <time>{{ date('Y', strtotime($pengalaman->tgl_mulai)) }}&nbsp;<b>&#8211;</b>&nbsp;{{ date('Y', strtotime($pengalaman->tgl_akhir)) }}</time>
                                    </header>
                                    <span>{{ $pengalaman->posisi }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </section>
                    <section class="education">
                        <h6>Pendidikan</h6>
                        <ol>
                            @foreach ($data->pendidikan as $pendidikan)
                                <li>
                                    <div>
                                        <p class="sanserif">{{ $pendidikan->nama_sekolah }}</p>
                                        <time>{{ $pendidikan->angkatan }}</time>
                                    </div>
                                    <div>
                                        <span>{{ $pendidikan->jurusan }}</span>
                                        <span></span>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </section>
                    <section class="education">
                        <h6>Skill</h6>
                        <table>
                            @foreach ($data->skill as $skill)
                                <tr>
                                    <td style="padding-right:30px">{{ $skill->keahlian }}</td>
                                    <td>
                                        @if ($skill->grade == 'LOW')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif ($skill->grade == 'MEDIUM')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif ($skill->grade == 'GOOD')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif ($skill->grade == 'VERY GOOD')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif ($skill->grade == 'EXPERT')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </section>
                    <section class="education">
                        <h6>Personal Assesment</h6>
                        <table>
                            {{-- @foreach ($data->skill as $skill) --}}
                                @foreach ($datacv->assesmen as $assesmen)
                                <tr>
                                    <td style="padding-right:30px">{{ $assesmen->soal1 }}</td>
                                    <td>
                                        @if ($assesmen->grade == 'LOW')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif ($assesmen->grade == 'MEDIUM')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif ($assesmen->grade == 'GOOD')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif ($assesmen->grade == 'VERY GOOD')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                        @elseif ($assesmen->grade == 'EXPERT')
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach
                            {{-- @endforeach --}}
                        </table>
                    </section>
                </section>
            </section>
        </section>
    </section>
</body>

</html>
