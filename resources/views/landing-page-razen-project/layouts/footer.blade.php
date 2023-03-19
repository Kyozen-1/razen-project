@php
    use Carbon\Carbon;
    use App\Models\RazenProject\Admin\RazenProjectLayanan;

    $jumlah_layanan = ceil(RazenProjectLayanan::count()/3);
@endphp
<footer id="footer" class="footer-1">
    <!-- Contact Bar
    ============================================= -->
    <div class="container footer-widgtes">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="widgets-contact">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-map"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">kunjungi kami</p>
                                <p class="text-capitalize font-heading">{{$profil->alamat}}</p>
                            </div>
                        </div>
                        <!-- .widget end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-envelope"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">email kami</p>
                                <p class="text-capitalize font-heading">{{$profil->email}}</p>
                            </div>
                        </div>
                        <!-- .widget end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-phone"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">telpon kami</p>
                                <p class="text-capitalize font-heading">{{$profil->no_hp}}</p>
                            </div>
                        </div>
                        <!-- .widget end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .widget-contact end -->
            </div>
            <!-- .col-md-12 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->

    <!-- Widget Section
    ============================================= -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 widgets-links">
                <div class="col-xs-12 col-sm-12 col-md-4 widget-about text-center-xs mb-30-xs">
                    <div class="widget-about-logo pull-left pull-none-xs">
                        <img src="{{ asset('razen-project/assets/images/footer-logo.png') }}" alt="logo"/>
                    </div>
                    <div class="widget-about-info">
                        <h5 class="text-capitalize text-white">Razen Project</h5>
                        <p class="mb-0">Razen Project berkembang dibidang jasa design dan konstruksi, terdiri dari design arsitektur, design interior, perencanaan struktur, serta pembuatan bangunan yang berlokasi di Pasar Rebo Jakarta Timur. Kami sebagai kontraktor mengerjakan proyek-proyek konstruksi dengan tepat waktu sesuai time schedule, standar kualitas yang kami berikan adalah yang terbaik.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 widget-navigation text-center-xs mb-30-xs">
                    <h5 class="text-capitalize text-white">navigasi</h5>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="{{ route('beranda') }}"> beranda</a>
                                </li>
                                <li>
                                    <a href="{{ route('perusahaan') }}"> perusahaan</a>
                                </li>
                                <li>
                                    <a href="{{ route('layanan') }}"> layanan</a>
                                </li>
                                <li>
                                    <a href="{{ env('RAZEN_URL ') }}"> ecommerce</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="#"> E-learning</a>
                                </li>
                                <li>
                                    <a href="{{ route('proyek') }}"> proyek</a>
                                </li>
                                <li>
                                    <a href="{{ route('kontak') }}"> kontak</a>
                                </li>
                                <li>
                                    <a href="{{route('blog')}}"> blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 widget-services text-center-xs">
                    <h5 class="text-capitalize text-white">Layanan</h5>
                    <div class="row">
                        @for ($i = 0; $i < $jumlah_layanan; $i++)
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <ul class="list-unstyled text-capitalize">
                                    @php
                                        $layanans = RazenProjectLayanan::skip(3 * $i)->take(3)->get();
                                    @endphp
                                    @foreach ($layanans as $layanan)
                                        <li>
                                            <a href="#"> {{$layanan->judul}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Social bar
    ============================================= -->
    <div class="widget-social">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 mb-30-xs mb-30-sm">
                    <div class="widget-social-info pull-left text-capitalize pull-none-xs mb-15-xs">
                        <p class="mb-0">Ikuti Kami<br>
                            Di Jejaring Sosial</p>
                    </div>
                    <div class="widget-social-icon pull-right text-right pull-none-xs">
                        @foreach ($get_pivot_media_sosials as $item)
                            <a href="{{$item->tautan}}">
                                <i class="{{$item->master_media_sosial->kode_ikon}}"></i><i class="{{$item->master_media_sosial->kode_ikon}}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="widget-newsletter-info pull-left text-capitalize pull-none-xs mb-15-xs">
                        <p class="mb-0">Berlangganan <br> Di Buletin Kami</p>
                    </div>
                    <div class="widget-newsletter-form pull-right text-right">

                        <!-- Mailchimp Form
                        =============================================-->
                        <form id="email_berlangganan_form" action="{{ route('email-berlangganan') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" placeholder="Ketik Akun Email Anda">
                                <span class="input-group-btn">
                                <button class="btn text-capitalize">gabung</button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                        <!--Mailchimp Form End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyrights
    ============================================= -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 copyrights text-center">
                <p class="text-capitalize">© {{Carbon::now()->year}} PT Razen Teknologi Indonesia</p>
            </div>
        </div>
    </div>
</footer>
@include('sweetalert::alert')
