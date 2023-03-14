<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>
        @include('landing-page-razen-project.layouts.head')
    </head>
    <body class="dark">
        <div class="preloader">
            <div class="spinner">
                <div class="bounce1">
                </div>
                <div class="bounce2">
                </div>
                <div class="bounce3">
                </div>
            </div>
        </div>

        <header id="navbar-spy" class="full-header dark-header">
            <div id="top-bar" class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 hidden-xs">
                            <ul class="list-inline top-contact">
                                <li>
                                    <p>No. Hp:
                                        <span>{{$profil->no_hp}}</span>
                                    </p>
                                </li>
                                <li>
                                    <p>Email:
                                        <span>{{$profil->email}}</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <!-- .col-md-6 end -->
                        <div class="col-xs-12 col-sm-6 col-md-6 text-right">
                            <ul class="list-inline top-widget">
                                <li class="top-social">
                                    @if ($facebook['status'] == 'ada')
                                        <a href="{{$facebook['tautan']}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                    @else
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    @endif

                                    @if ($twitter['status'] == 'ada')
                                        <a href="{{$twitter['tautan']}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                    @else
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    @endif

                                    @if ($instagram['status'] == 'ada')
                                        <a href="{{$instagram['tautan']}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                    @else
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    @endif

                                    @if ($youtube['status'] == 'ada')
                                        <a href="{{$youtube['tautan']}}" target="_blank"><i class="fa fa-youtube"></i></a>
                                    @else
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    @endif
                                </li>
                                <li>
                                    <!-- Modal -->
                                    <!-- .model-quote end -->
                                </li>
                            </ul>
                        </div>
                        <!-- .col-md-6 end -->
                    </div>
                </div>
            </div>
            <nav id="primary-menu" class="navbar navbar-fixed-top style-1">
                <div class="row">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="logo" href="{{ route('beranda') }}">
                                <img src="{{ asset('images/razen-project/logo/'.$profil->logo) }}" alt="Razen Project" height="40px">
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                @if (request()->routeIs('beranda'))
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                    <a href="{{ route('beranda') }}">Beranda</a>
                                </li>

                                @if (request()->routeIs('perusahaan'))
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                    <a href="{{ route('perusahaan') }}">Perusahaan</a>
                                </li>

                                @if (request()->routeIs('layanan'))
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                    <a href="{{ route('layanan') }}">Layanan</a>
                                </li>

                                <li>
                                    <a href="{{env('RAZEN_URL')}}">E-Commerce</a>
                                </li>

                                @if (request()->routeIs('proyek'))
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                    <a href="{{ route('proyek') }}">Proyek</a>
                                </li>

                                @if (request()->routeIs('blog'))
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                    <a href="{{ route('blog') }}">Blog</a>
                                </li>

                                @if (request()->routeIs('kontak'))
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                    <a href="{{ route('kontak') }}">Kontak</a>
                                </li>
                            </ul>

                            <!-- Mod-->
                            <!-- .module-search-->
                            <!-- .module-cart -->
                            <!-- .module-cart end -->

                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
            </nav>
        </header>

        @yield('content')

        <!-- Call To Action #1
        ============================================= -->
        <section id="cta-1" class="cta pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="cta-1 bg-theme">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-1 hidden-xs">
                                    <div class="cta-img">
                                        <img src="{{ asset('razen-project/assets/images/call/cta-1.png') }}" alt="cta">
                                    </div>
                                </div>
                                <!-- .col-md-2 end -->
                                <div class="col-xs-12 col-sm-12 col-md-7 cta-devider text-center-xs">
                                    <div class="cta-desc">
                                        <p>Ada pertanyaan !</p>
                                        <h5>Jangan Ragu Untuk Menghubungi Kami Setiap Saat.</h5>
                                    </div>
                                </div>
                                <!-- .col-md-7 end -->
                                <div class="col-xs-12 col-sm-12 col-md-2 pull-right pull-none-xs">
                                    <div class="cta-action">
                                        <a class="btn btn-secondary"  target="blank" href="//api.whatsapp.com/send?phone={{preg_replace("/^0/","62", $profil->no_hp)}}&text=Halo kak, saya ingin membahas sebuah proyek">Kontak Kami</a>
                                    </div>
                                </div>
                                <!-- .col-md-2 end -->
                            </div>
                        </div>
                        <!-- .cta-1 end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>

        @include('landing-page-razen-project.layouts.footer')

        @include('landing-page-razen-project.layouts.js')
    </body>
</html>
