@extends('landing-page-razen-project.layouts.app')

@section('content')
<!-- Page Title
============================================= -->
<section class="bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
		<img src="{{ asset('razen-project/assets/images/page-title/2.jpg') }}" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
						<h2>layanan - layanan kami</h2>
					</div>
					<ol class="breadcrumb">
						<li>
							<a href="{{ route('beranda') }}">Beranda</a>
						</li>
						<li class="active">Layanan - layanan</li>
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

<!-- Services
============================================= -->
<section class="service service2 service-7 pb-0">
	<div class="container">
		<div class="row">
			<div class="sidebar sidebar-services sidebar-full col-xs-12 col-sm-12 col-md-3">

				<!-- Categories
				============================================= -->
				<div class="widget widget-categories">
					<div class="widget-content">
						<ul class="list-unstyled">
							<li class="active">
								<a href="#">All services</a>
							</li>
							<li>
								<a href="#">Tiling &amp; Painting</a>
							</li>
							<li>
								<a href="#">Renovations</a>
							</li>
							<li>
								<a href="#">Design &amp; Build</a>
							</li>
							<li>
								<a href="#">Consulting</a>
							</li>
							<li>
								<a href="#">Management</a>
							</li>
							<li>
								<a href="#">Wood Flooring</a>
							</li>
						</ul>
					</div>
				</div>

				<!-- Download
				============================================= -->
				<div class="widget widget-download">
					<div class="widget-title">
						<h3>Download Brochures</h3>
					</div>
					<div class="widget-content">
						<div class="download download-pdf">
							<a href="#">
								<div class="download-desc">
									<div class="download-desc-icon">
										<img src="assets/images/sidebar/1.png" alt="icon"/>
									</div>
									<h4>Download.pdf</h4>
								</div>
								<div class="download-icon">
									<i class="fa fa-download"></i>
								</div>
							</a>
						</div>
						<!-- .download-pdf end -->

						<div class="download download-doc">
							<a href="#">
								<div class="download-desc">
									<div class="download-desc-icon">
										<img src="assets/images/sidebar/2.png" alt="icon"/>
									</div>
									<h4>Download.doc</h4>
								</div>
								<div class="download-icon">
									<i class="fa fa-download"></i>
								</div>
							</a>
						</div>
						<!-- .download-pdf end -->
					</div>
				</div>
			</div>
			<!-- .sidebar end -->
			<div class="col-xs-12 col-sm-12 col-md-9">
				<div class="row">
                    @foreach ($layanans as $layanan)
                        <!-- Service Block #1 -->
                        <div class="col-xs-12 col-sm-6 col-md-4 service-block">
                            <div class="service-img">
                                <img src="{{ asset('images/razen-project/gambar-layanan/'.$layanan->gambar) }}" class="img-responsive" alt="icons"/>
                            </div>
                            <div class="service-content">
                                <div class="service-desc">
                                    <h4>{{$layanan->judul}}</h4>
                                    <p>{{$layanan->deskripsi}}</p>
                                    <a class="read-more" href="#"><i class="fa fa-plus"></i>
                                        <span>read more</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-4 end -->
                    @endforeach
				</div>
				<!-- .row end -->
			</div>
			<!-- .col-md-9 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
@endsection
