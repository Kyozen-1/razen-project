@extends('landing-page-razen-project.layouts.app')

@section('content')
    <!-- Hero #2
    ============================================= -->
    <section id="hero-2" class="hero-2">
        <div id="hero-slider" class="hero-slider">

            @foreach ($hero_sliders as $hero_slider)
                <!-- Slide Item #1 -->
                <div class="item">
                    <div class="item-bg bg-overlay">
                        <div class="bg-section">
                            <img src="{{ asset('images/razen-project/gambar-slider/'.$hero_slider->gambar) }}" alt="Background"/>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="hero-slide">
                                    <div class="slide-heading">
                                        <p>{{$hero_slider->heading}}</p>
                                    </div>
                                    <div class="slide-title">
                                        <h2>{{$hero_slider->title}}</h2>
                                    </div>
                                    <div class="slide-action">
                                        <a class="btn btn-primary" href="{{route('perusahaan')}}">Baca lebih lanjut</a>
                                        <a class="btn btn-secondary pull-right" href="//api.whatsapp.com/send?phone={{preg_replace("/^0/","62", $profil->no_hp)}}&text=Halo kak, saya ingin membahas sebuah proyek">Ayo Mulai</a>
                                    </div>
                                </div>
                            </div>
                            <!-- .col-md-12 end -->
                        </div>
                        <!-- .row end -->
                    </div>
                    <!-- .container end -->
                </div>
                <!-- .item end -->
            @endforeach
        </div>
        <!-- #hero-slider end -->
    </section>

    <!-- Call To Action #2
    ============================================= -->
    <section id="cta-2" class="cta pb-0 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="cta-2 bg-theme">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="cta-icon">
                                    <i class="lnr lnr-apartment"></i>
                                </div>
                                <div class="cta-devider">
                                </div>
                                <div class="cta-desc">
                                    <p>Ada Pertanyaan ?</p>
                                    <h5>Konsultasi gratis!, Hubungi kami.</h5>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-5 cta-action text-right pull-right pull-none-xs">
                                <a class="btn btn-primary btn-white mr-sm" href="#" data-toggle="modal" data-target="#model-quote" id="modelquote">FAQs</a>
                                <a class="btn btn-secondary" href="//api.whatsapp.com/send?phone={{preg_replace("/^0/","62", $profil->no_hp)}}&text=Halo kak, saya ingin membahas sebuah proyek">Kontak</a>

                            </div>
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
    <!-- #cta-2 end -->

    <!-- Service Block #1
    ============================================= -->
    <section id="service-1" class="service service-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-2 text-center">
                        <div class="heading-bg">
                            <p class="mb-0">apa yang dapat kami lakukan ?</p>
                            <h2>layanan - layanan kami</h2>
                        </div>
                        <p class="mb-0 mt-md">Razen Project berkembang dibidang jasa design dan konstruksi, terdiri dari design arsitektur, design interior, perencanaan struktur, serta pembuatan bangunan yang berlokasi di Pasar Rebo Jakarta Timur. Kami sebagai kontraktor mengerjakan proyek-proyek konstruksi dengan tepat waktu sesuai time schedule, standar kualitas yang kami berikan adalah yang terbaik.</p>
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-6 end -->
            </div>
            <!-- .row end -->
            <div class="row">
                @foreach ($layanans as $layanan)
                    <!-- Service Block #1 -->
                    <div class="col-xs-12 col-sm-4 col-md-4 service-block">
                        <div class="service-img">
                            <img src="{{ asset('images/razen-project/gambar-layanan/'.$layanan->gambar) }}" alt="service">
                        </div>
                        <div class="service-content">
                            <h4>{{$layanan->judul}}</h4>
                            <p>{{$layanan->deskripsi}}</p>
                        </div>
                    </div>
                    <!-- .col-md-4 end -->
                @endforeach
            </div>
            <!-- .row end -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a class="btn btn-secondary mt-50" href="{{ route('layanan') }}">Semua Layanan <i class="fa fa-plus ml-xs"></i></a>
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>

    <!-- Projects Section
    ============================================= -->
    <section id="projects" class="projects-fullwidth projects-4col bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                    <div class="heading heading-3 text-center mb-0">
                        <div class="heading-bg">
                            <p class="mb-0">great &amp; awesome works</p>
                            <h2>Proyek Kami</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-8 end -->
            </div>
        </div>
        <!-- .container end -->
        <div class="container-fluid">
            <div class="row">
                <!-- Projects Filter
                ============================================= -->
                <div class="col-xs-12 col-sm-12 col-md-12 projects-filter">
                    <ul class="list-inline">
                        <li>
                            <a class="active-filter" href="#" data-filter="*">Semua Proyek</a>
                        </li>
                        @foreach ($kategori_project as $id => $nama)
                            <li>
                                <a href="#" data-filter=".{{$nama}}">{{$nama}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- .projects-filter end -->
            </div>
            <!-- .row end -->

            <!-- Projects Item
            ============================================= -->
            <div id="projects-all" class="row">
                @foreach ($item_virtual_tours as $item_virtual_tour)
                    <!-- Project Item #1 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 project-item {{$item_virtual_tour->master_kategori_project->nama}}">
                        <div class="project-img">
                            <img class="" src="{{ asset('images/razen-project/item-virtual-tour/'.$item_virtual_tour->thumb) }}" alt="{{$item_virtual_tour->master_kategori_project->nama}}"/>
                            <div class="project-hover">
                                <div class="project-meta">
                                    <h6>{{$item_virtual_tour->master_kategori_project->nama}}</h6>
                                    <h4>
                                        {{-- <a href="{{$item_virtual_tour->link}}" target="blank"></a> --}}
                                        {{$item_virtual_tour->nama}}
                                    </h4>
                                </div>
                                <div class="project-zoom">
                                    <a class="img-popup mr-3" href="{{ asset('images/razen-project/item-virtual-tour/'.$item_virtual_tour->thumb) }}" title="Preview"><i class="fa fa-plus"></i></a>
                                    {{-- <a class="btn btn-icon" href="{{$item_virtual_tour->link}}" target="blank"><i class="fa fa-eye"></i></a> --}}
                                    <a type="button" data-toggle="modal" data-target="#detail" class="btn btn-icon" id="btn_view_3d_model" data-kode="{{$item_virtual_tour->kode_embed}}"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <!-- .project-hover end -->
                        </div>
                        <!-- .project-img end -->

                    </div>
                    <!-- .project-item end -->
                @endforeach

            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>

    <div id="detail" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detail-title">View 3D Model</h4>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body" id="modal_body_3d_model">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- Shortcode #5
    ============================================= -->
    <section id="shortcode-5" class="shortcode-5 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-2 text-center">
                        <div class="heading-bg">
                            <p class="mb-0">Semua tentang perusahaan kami</p>
						    <h2>perusahaan kami</h2>
                        </div>
                        <p class="mb-0">Razen Project berkembang dibidang jasa design dan konstruksi, terdiri dari design arsitektur, design interior, perencanaan struktur, serta pembuatan bangunan yang berlokasi di Pasar Rebo Jakarta Timur. Kami sebagai kontraktor mengerjakan proyek-proyek konstruksi dengan tepat waktu sesuai time schedule, standar kualitas yang kami berikan adalah yang terbaik.</p>
                    </div>
                    <!-- .heading end -->
                </div>
            </div>
            <!-- .row end -->
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="panel-group accordion" id="accordion02" role="tablist" aria-multiselectable="true">

                        <!-- Panel 01 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-1" aria-expanded="true" aria-controls="collapse02-1"> Tentang Razen Project </a>
                                    <span class="icon"></span>
                                </h4>
                            </div>
                            <div id="collapse02-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    {{$about->about}}
                                </div>
                            </div>
                        </div>

                        <!-- Panel 02 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-2" aria-expanded="false" aria-controls="collapse02-2"> Misi Kami </a>
                                </h4>
                            </div>
                            <div id="collapse02-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    {{$about->misi}}
                                </div>
                            </div>
                        </div>

                        <!-- Panel 03 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-3" aria-expanded="false" aria-controls="collapse02-3"> Tujuan Kami </a>
                                </h4>
                            </div>
                            <div id="collapse02-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    {{$about->tujuan}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .Accordion-->
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 hidden-xs">
                    <div class="feature">
                        <img class="img-responsive" src="{{ asset('razen-project/assets/images/features/2.jpg') }}" alt="feature">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    @if ($pivot_about['status'] == 'ada')
                        @foreach ($pivot_about['pivot'] as $item)
                            <div class="feature">
                                <h4 class="text-uppercase">{{$item->judul}}</h4>
                                <p>{{$item->deskripsi}}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action #3
    ============================================= -->
    <section id="cta-3" class="cta cta-3 bg-overlay bg-overlay-theme text-center">
        <div class="bg-section" >
            <img src="{{ asset('razen-project/assets/images/call/2.jpg') }}" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                    <h2>Quality Comes First</h2>
                    <p>Untuk mencapai target sesuai dengan waktu yang ditentukan, perlu beberapa tim kerja yang sinkron dan bersinergi. Sehingga gerak perusahaan menjadi efektif serta efisien, baik dari segi waktu, sumber daya, dan berbagai faktor lainnya. Maka dari saya memilih team yang berpengalaman pada bidangnya.</p>
                    <div class="signiture">
                        <img src="{{ asset('razen-project/assets/images/call/sign.png') }}" alt="signiture"/>
                    </div>
                </div>
                <!-- .col-md-8 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #cta-3 end -->

    <!-- Shortcode #8
    ============================================= -->
    <section id="shortcode-8" class="shortcode-8 pb-0 pb-60-sm">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-2 mb-0 text-center">
                        <div class="heading-bg">
                            <h2>Kenapa Razen Project</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
            </div>
            <!-- .row end -->
            <div class="clearfix mb-50">
            </div>
            <div class="row">
                <!-- .col-md-12 end -->
                <div class="col-xs-12 col-sm-6 col-md-4 text-right">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 feature">
                            <div class="feature-icon right">
                                <i class="lnr lnr-calendar-full"></i>
                            </div>
                            <h4 class="text-uppercase">Always Available</h4>
                            <p>Jangan Malu Untuk Berdiskusi, Kami Akan Selalu Ada Untuk Anda.</p>
                        </div>
                        <!-- .col-md-12 end -->
                        <div class="col-xs-12 col-sm-12 col-md-12 feature">
                            <div class="feature-icon right">
                                <i class="lnr lnr-database"></i>
                            </div>
                            <h4 class="text-uppercase">Fair Prices</h4>
                            <p>Jadi, Bangunan Anda Terjamin Aman, Tidak Akan Overbudget, Tentunya Sesuai Harapan</p>
                        </div>
                        <!-- .col-md-12 end -->

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-4 end -->
                <div class="col-xs-12 col-sm-4 col-md-4 hidden-xs hidden-sm">
                    <div class="feature-img">
                        <img src="{{ asset('razen-project/assets/images/features/3.png') }}" alt="image"/>
                    </div>
                </div>
                <!-- .col-md-4 end -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 feature">
                            <div class="feature-icon">
                                <i class="lnr lnr-briefcase"></i>
                            </div>
                            <h4 class="text-uppercase">Qualified Agents</h4>
                            <p>Akan Menjadi Jaminan Kualitas Untuk Pembangunan Rumah Anda</p>
                        </div>
                        <!-- .col-md-4 end -->
                        <div class="col-xs-12 col-sm-12 col-md-12 feature">
                            <div class="feature-icon">
                                <i class="lnr lnr-cart"></i>
                            </div>
                            <h4 class="text-uppercase">Best Offers</h4>
                            <p>Transparansi dan Kejelasan bagi Klien & Mitra Usaha</p>
                        </div>
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-4 end-->
            </div>
        </div>
    </section>

    <!-- Testimonials #1
    ============================================= -->
    <section id="testimonials" class="testimonial testimonial-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-3 text-center">
                        <div class="heading-bg">
                            <p class="mb-0">apa yang dikatakan orang ?</p>
                            <h2>testimonial</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div id="testimonial-oc" class="testimonial-carousel">

                        @foreach ($testimonials as $testimonial)
                            <!-- testimonial item #1 -->
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <div class="testimonial-img">
                                        <i class="fa fa-quote-left"></i>
                                        <img src="{{ asset('images/razen-project/foto-testimoni/'.$testimonial->foto) }}" alt="author"/>
                                    </div>
                                    <p>{{$testimonial->testimonial}}</p>
                                </div>
                                <div class="testimonial-divider">
                                </div>
                                <div class="testimonial-meta">
                                    <strong>{{$testimonial->nama}}</strong>, {{$testimonial->jabatan}}
                                </div>
                            </div>
                            <!-- .testimonial-item end -->
                        @endforeach

                    </div>
                </div>
                <!-- .col-md-12 end -->

            </div>
            <!-- .row end -->

        </div>
        <!-- .container end -->

    </section>
    <!-- #testimonials end -->

    <!-- Shortcode #9
    ============================================= -->
    <section id="clients" class="shortcode-9">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-2 text-center">
                        <div class="heading-bg">
                            <p class="mb-0">Mereka Selalu Percaya Kami</p>
                            <h2>Klien Kami</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
            <div class="row">
                @foreach ($clients as $client)
                    <!-- Client Item -->
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="brand">
                            <img class="img-responsive center-block" src="{{ asset('images/razen-project/foto-client/'.$client->foto) }}" alt="brand">
                        </div>
                    </div>
                    <!-- .col-md-2 end -->
                @endforeach
            </div>
            <!-- .row End -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #clients end-->
@endsection

@section('js')
    <script>
        $('#btn_view_3d_model').click(function(){
            var kode = $(this).attr('data-kode');
            $('#modal_body_3d_model').append(kode);
        });
    </script>
@endsection
