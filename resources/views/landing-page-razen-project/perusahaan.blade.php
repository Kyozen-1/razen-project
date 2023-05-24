@extends('landing-page-razen-project.layouts.app')

@section('content')
@php
    use App\Models\RazenProject\Admin\PivotRazenProjectSectionTimMediaSosial as PivotTimMediaSosial;
@endphp
<!-- Page Title
============================================= -->
<section class="bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
		<img src="{{ asset('razen-project/assets/images/page-title/8.jpg') }}" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
						<h2>Perusahaan</h2>
					</div>
					<ol class="breadcrumb">
						<li>
							<a href="{{ route('beranda') }}">Beranda</a>
						</li>
						<li class="active">perusahaan</li>
					</ol>
				</div>
				<!-- .page-title end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

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
                    <img class="img-responsive" src="{{ asset('images/razen-project/gambar-tentang-perusahaan/'.$about->gambar) }}" alt="feature">
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

<!-- Shortcode #3
============================================= -->
<section class="section-img bg-gray">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-content" style="text-align: center">
				<div class="heading heading-4 mb-lg">
					<div class="heading-bg heading-right">
						<p class="mb-0">{{$fitur_perusahaan->judul_pendek}}</p>
						<h2>{{$fitur_perusahaan->judul}}</h2>
					</div>
				</div>
				<!-- .heading end -->
				<div class="row pr-sm">
                    @if ($pivot_fitur_perusahaan['status'] == 'ada')
                        @foreach ($pivot_fitur_perusahaan['pivot'] as $item)
                            <div class="col-xs-12 col-sm-12 col-md-6 feature feature-1">
                                <h4 class="text-uppercase font-16">{{$item->judul}}</h4>
                                <p>{{$item->deskripsi}}</p>
                            </div>
                        @endforeach
                    @endif
				</div>
				<!-- .row end -->
			</div>
			<!-- .col-md-6 end -->
			<div class="col-md-6 col-img">
				<div class="col-bg">
					<img src="{{ asset('images/razen-project/gambar-fitur-perusahaan/'.$fitur_perusahaan->gambar) }}" alt="Background"/>
				</div>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Team
============================================= -->
<section class="team">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-2 text-center">
					<div class="heading-bg">
						<p class="mb-0">Otak Kreatif</p>
						<h2>Tim Kami</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-8 end -->
			<div class="clearfix">
			</div>
            @foreach ($tims as $tim)
                @php
                    $pivots = PivotTimMediaSosial::where('razen_project_section_tim_id', $tim->id)->get();
                @endphp
                <!-- Member #1 -->
                <div class="col-xs-12 col-sm-6 col-md-3 member mb-0">
                    <div class="member-img">
                        <img src="{{ asset('images/razen-project/gambar-tim/'. $tim->gambar) }}" alt="member"/>
                        <div class="member-bg">
                        </div>
                        <div class="member-overlay">
                            @foreach ($pivots as $pivot)
                                <a href="{{$pivot->tautan}}"><i class="{{$pivot->master_media_sosial->kode_ikon}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                    <!-- .member-img end -->
                    <div class="member-bio">
                        <h3>{{$tim->nama}}</h3>
                        <p>{{$tim->master_jabatan_tim->nama}}</p>
                    </div>
                    <!-- .member-bio end -->
                </div>
            @endforeach

		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Shortcode #4
============================================= -->
<section id="shortcode-4" class="shortcode-4 bg-gray">
	<div class="container text-center">
		<div class="row">

			<!-- Section Body
			============================================= -->
			<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="facts-box">
					<div class="counter">
						{{$jumlah_proyek}}
					</div>
					<h4 class="text-uppercase">Proyek</h4>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="facts-box">
					<div class="counter">
						{{$jumlah_tim}}
					</div>
					<h4 class="text-uppercase">Tim</h4>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="facts-box">
					<div class="counter">
						321
					</div>
					<h4 class="text-uppercase">Awards Won</h4>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="facts-box last">
					<div class="counter">
						2314
					</div>
					<h4 class="text-uppercase">Happy Customers</h4>
				</div>
			</div>
		</div>
	</div>
</section>

    <!-- Shortcode #6
============================================= -->
<section id="shortcode-6" class="shortcode-6 bg-gray text-center-xs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-4">
					<div class="heading-bg heading-right">
						<p class="mb-0">Internationally Trusted !</p>
						<h2>Certifications</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4">
				<p>Innovativeness is the pledge of our stable development. We tap into the most successful international management data, forestalling the market & setting new standards.</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
				<div class="feature feature-2">
					<div class="feature-icon">
						<i class="lnr lnr-license font-40 color-theme"></i>
					</div>
					<h4 class="text-uppercase font-16">safety</h4>
				</div>
			</div>
			<!-- .col-md-6 end -->
			<div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
				<div class="feature feature-2">
					<div class="feature-icon">
						<i class="lnr lnr-users font-40 color-theme"></i>
					</div>
					<h4 class="text-uppercase font-16">Community</h4>
				</div>
			</div>
			<!-- .col-md-6 end -->
			<div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
				<div class="feature feature-2">
					<div class="feature-icon">
						<i class="lnr lnr-cloud-sync font-40 color-theme"></i>
					</div>
					<h4 class="text-uppercase font-16">Sustainability</h4>
				</div>
			</div>
			<!-- .col-md-6 end -->
			<div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
				<div class="feature feature-2">
					<div class="feature-icon">
						<i class="lnr lnr-construction font-40 color-theme"></i>
					</div>
					<h4 class="text-uppercase font-16">Integrity</h4>
				</div>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

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
