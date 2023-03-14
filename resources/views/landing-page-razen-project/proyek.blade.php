@extends('landing-page-razen-project.layouts.app')

@section('content')
<section class="bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
		<img src="{{ asset('razen-project/assets/images/page-title/2.jpg') }}" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
						<h2>Our Projects</h2>
					</div>
					<ol class="breadcrumb">
						<li>
							<a href="{{ route('beranda') }}">Beranda</a>
						</li>
						<li class="active">Proyek</li>
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

<!-- Projects Section
============================================= -->
<section id="projects" class="projects-fullwidth projects-4col">
	<div class="container-fluid">
		<div class="row">
			<!-- Projects Filter
			============================================= -->
			<div class="col-xs-12 col-sm-12 col-md-12 projects-filter">
				<ul class="list-inline">
					<li>
						<a class="active-filter" href="#" data-filter="*">All Projects</a>
					</li>
					{{-- <li>
						<a href="#" data-filter=".interior">Interior</a>
					</li>
					<li>
						<a href="#" data-filter=".renovation">Renovation</a>
					</li>
					<li>
						<a href="#" data-filter=".architecture">Architecture</a>
					</li>
					<li>
						<a href="#" data-filter=".landscaping">Landscaping</a>
					</li>
					<li>
						<a href="#" data-filter=".gardening">Gardening</a>
					</li> --}}
                    @foreach ($kategori_results as $kategori_result)
                        <li>
                            <a href="#" data-filter=".{{strtolower($kategori_result->name)}}">{{$kategori_result->name}}</a>
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
            @foreach ($produk_results as $item)
                @php
                    $kategori_produk = '';
                    foreach ($item->kategori_produk as $value) {
                        $kategori_produk .= strtolower($value) . ' ';
                    }

                @endphp
                <!-- Project Item #1 -->
                <div class="col-xs-12 col-sm-6 col-md-4 project-item {{$kategori_produk}}">
                    <div class="project-img">
                        <img class="img-responsive" src="{{ env('RAZEN_URL') }}storage/{{json_decode($item->gambar)[0]}}"/>
                        <div class="project-hover">
                            <div class="project-meta">
                                <h4>
                                    <a href="#">{{$item->nama}}</a>
                                </h4>
                            </div>
                            <div class="project-zoom">
                                <a class="img-popup mr-3" href="{{ env('RAZEN_URL') }}storage/{{json_decode($item->gambar)[0]}}" title="Preview"><i class="fa fa-plus"></i></a>
                                <a type="button" data-toggle="modal" data-target="#detail" class="btn btn-icon" id="btn_view_3d_model" data-kode=""><i class="fa fa-eye"></i></a>
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
@endsection

@section('js')
    <script>
        $('#btn_view_3d_model').click(function(){
            var kode = $(this).attr('data-kode');
            $('#modal_body_3d_model').append(kode);
        });
    </script>
@endsection
