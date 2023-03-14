@extends('landing-page-razen-project.layouts.app')

@section('content')
<!-- Page Title
============================================= -->
<section class=" bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
		<img src="{{ asset('razen-project/assets/images/page-title/9.jpg') }}" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
						<h2>Kontak Kami</h2>
					</div>
					<ol class="breadcrumb">
						<li>
							<a href="{{ route('beranda') }}">Beranda</a>
						</li>
						<li class="active">Kontak</li>
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

<!-- Contact #1
============================================= -->
<section id="contact" class="contact">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-4">
					<div class="heading-bg heading-right">
						<p class="mb-0">Kami Ingin Mendengar Dari Anda !</p>
						<h2>Kontak Kami</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 widgets-contact mb-60-xs">
						<div class="widget">
							<div class="widget-contact-icon pull-left">
								<i class="lnr lnr-map"></i>
							</div>
							<div class="widget-contact-info">
								<p class="text-capitalize">Kunjungi kami</p>
								<p class="text-capitalize font-heading">{{$profil->alamat}}</p>
							</div>
						</div>
						<!-- .widget end -->
						<div class="clearfix">
						</div>
						<div class="widget">
							<div class="widget-contact-icon pull-left">
								<i class="lnr lnr-envelope"></i>
							</div>
							<div class="widget-contact-info">
								<p class="text-capitalize ">Email Kami</p>
								<p class="text-capitalize font-heading">{{$profil->email}}</p>
							</div>
						</div>
						<!-- .widget end -->
						<div class="clearfix">
						</div>
						<div class="widget">
							<div class="widget-contact-icon pull-left">
								<i class="lnr lnr-phone"></i>
							</div>
							<div class="widget-contact-info">
								<p class="text-capitalize">Hubungi Kami</p>
								<p class="text-capitalize font-heading">{{$profil->no_hp}}</p>
							</div>
						</div>
						<!-- .widget end -->
					</div>
					<!-- .col-md-4 end -->
					<div class="col-xs-12 col-sm-12 col-md-8">
						<div class="row">
							<form action="{{ route('kontak-kami') }}" method="post">
                                @csrf
								<div class="col-md-6">
									<input type="text" class="form-control mb-30" name="contact_name" id="name" placeholder="Nama anda" required/>
								</div>
								<div class="col-md-6">
									<input type="email" class="form-control mb-30" name="contact_email" id="email" placeholder="Email anda" required/>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control mb-30" name="contact_telephone" id="telephone" placeholder="No HP" required/>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control mb-30" name="contact_subject" id="subject" placeholder="Subjek" required/>
								</div>
								<div class="col-md-12">
									<textarea class="form-control mb-30" name="contact-message" id="message" rows="2" placeholder="Detail Pesan" required></textarea>
								</div>
								<div class="col-md-12">
									<button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">Kirim Pesan</button>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
									<!--Alert Message-->
									<div id="contact-result">
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- .col-md-8 end -->
				</div>
				<!-- .row end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Google Maps
============================================= -->
<section class="google-maps pb-0 pt-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 pr-0 pl-0">
				<div id="googleMap" style="width:100%;height:240px;">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- .google-maps end -->
@endsection

@section('js')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="{{ asset('razen-project/assets/js/jquery.gmap.min.js') }}"></script>
<script type="text/javascript">
	$('#googleMap').gMap({
		address: "121 King St,Melbourne, Australia",
		zoom: 15,
		markers:[
			{
				address: "Melbourne, Australia",
				maptype:'ROADMAP',
			}
		]
	});
</script>
@endsection
