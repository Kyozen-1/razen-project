@extends('landing-page-razen-project.layouts.app')

@section('content')
<section class="bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
		<img src="{{ asset('/razen-project/assets/images/page-title/2.jpg') }}" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
						<h2>coming soon</h2>
					</div>
					<ol class="breadcrumb">
						<li>
							<a href="{{ route('beranda') }}">Beranda</a>
						</li>
						<li class="active">soon</li>
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
<section class="soon-page text-center">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="soon-title mb-50">
					<h1>We Are Coming Soon</h1>
				</div>
				<p class="italic">Yellow Hats is a leading developer of A-grade commercial, industrial and residential projects in USA.</p>
			</div>
			<div class="col-xs-12 col.sm-12 col-md-12">
				<div id="countdown" class="countdown">
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
