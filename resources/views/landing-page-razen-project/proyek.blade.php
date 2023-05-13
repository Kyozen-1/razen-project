@extends('landing-page-razen-project.layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .modal.modal-wide .modal-dialog {
        width: 90%;
    }
</style>
@endsection

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
                            <div class="project-meta mb-5">
                                <h4>
                                    <a href="{{preg_replace('#/+#','/',env('RAZEN_URL').$item->link)}}">{{$item->nama}}</a>
                                </h4>
                            </div>
                            <div class="row">
                                <a href="#" style="margin-right: 5px" title="Dimensi Lahan: {{$item->razen_project->dimensi_lahan_x}}m x {{$item->razen_project->dimensi_lahan_y}}m"><i class="fas fa-industry"></i> {{$item->razen_project->dimensi_lahan_x}}m x {{$item->razen_project->dimensi_lahan_y}}m</a>
                                <a href="#" style="margin-right: 5px" title="Luas Lahan: {{$item->razen_project->luas_lahan}} m2"><i class="fas fa-ruler-combined"></i> {{$item->razen_project->luas_lahan}}m2</a>
                                <a href="#" style="margin-right: 5px" title="Luas Bangunan: {{$item->razen_project->luas_bangunan}} m2"><i class="fas fa-ruler-horizontal"></i> {{$item->razen_project->luas_bangunan}}m2</a>
                                <a href="#" style="margin-right: 5px" title="Jumlah Lantai: {{$item->razen_project->jumlah_lantai}} buah"><i class="fas fa-home"></i> {{$item->razen_project->jumlah_lantai}}</a>
                                <a href="#" style="margin-right: 5px" title="Kamar Tidur: {{$item->razen_project->kamar_tidur}} buah"><i class="fas fa-bed"></i> {{$item->razen_project->kamar_tidur}}</a>
                                <a href="#" style="margin-right: 5px" title="Jumlah Toilet: {{$item->razen_project->jumlah_toilet}} buah"><i class="fas fa-toilet"></i> {{$item->razen_project->jumlah_toilet}}</a>
                            </div>
                            <div class="project-zoom">
                                <a class="img-popup mr-3" href="{{ env('RAZEN_URL') }}storage/{{json_decode($item->gambar)[0]}}" title="Preview"><i class="fa fa-search-plus"></i></a>
                                <a type="button" data-toggle="modal" data-target="#detail" class="btn btn-icon" id="btn_view_3d_model" data-kode="{{$item->razen_project->kode_embed_virtual_model}}"><i class="fa fa-eye"></i></a>
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
<div id="detail" class="modal modal-wide fade">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#btn_view_3d_model').click(function(){
            var kode = $(this).attr('data-kode');
            $('#modal_body_3d_model').empty();
            $('#modal_body_3d_model').append(kode);
        });
    </script>
@endsection
