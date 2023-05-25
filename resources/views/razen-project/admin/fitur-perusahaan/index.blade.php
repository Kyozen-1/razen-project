@extends('razen-project.admin.layouts.app')
@section('title', 'Admin - Razen Project | Fitur Perusahaan')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/font/CS-Interface/style.css') }}">
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/select2-bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/bootstrap-datepicker3.standalone.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-selection__rendered {
            line-height: 40px !important;
        }
        .select2-container .select2-selection--single {
            height: 41px !important;
        }
        .select2-selection__arrow {
            height: 36px !important;
        }
        .modal-dialog{
            pointer-events: all !important;
        }
    </style>
@endsection

@section('content')
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title"> Fitur Perusahaan</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('razen-project.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('razen-project.admin.fitur-perusahaan.index') }}">Fitur Perusahaan</a></li>
                </ul>
            </nav>
        </div>
        <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('razen-project.admin.fitur-perusahaan.store') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-6" style="justify-content: center; align-self: center;">
                        <label for="" class="small-title">Atur Fitur Perusahaan</label>
                    </div>
                    <div class="col-6" style="text-align: right">
                        <a href="{{ route('perusahaan') }}#shortcode-3" class="btn btn-icon waves-effect waves-light btn-secondary mr-1" target="blank"><i class="fas fa-pager"></i> Preview</a>
                        <button class="btn btn-outline-primary waves-effect waves-light">Simpan Perubahan</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="mb-3 position-relative form-group">
                            <label for="judul_pendek" class="form-label">Judul Pendek</label>
                            <input type="text" class="form-control" name="judul_pendek" id="judul_pendek" value="{{$fitur_perusahaan->judul_pendek}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" value="{{$fitur_perusahaan->judul}}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="file" class="dropify" name="gambar" data-height="400" data-allowed-file-extensions="png jpg jpeg webp" data-show-errors="true" data-default-file="{{ asset('images/razen-project/gambar-fitur-perusahaan/'.$fitur_perusahaan->gambar) }}"  required>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12" style="justify-content: center; align-self: center;">
                    <label for="" class="small-title">Atur Fitur</label>
                </div>
            </div>
            @if ($pivot_fitur_perusahaan['status'] == 'ada')
                <form id="edit_pivot_fitur_perusahaan_form" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        @php
                            $a = 1;
                        @endphp
                        @foreach ($pivot_fitur_perusahaan['pivot'] as $item)
                            <div class="col-12 col-md-4 col-pivot-fitur-perusahaan" id="{{$item->id}}">
                                <div class="border shadow p-3 mb-3">
                                    <div class="row mb-3">
                                        <div class="col-10">
                                            <label class="form-label">No: {{$a++}}</label>
                                        </div>
                                        <div class="col-2">
                                            <button class="close hapus-pivot-fitur-perusahaan" type="button" aria-hidden="true" data-id="{{$item->id}}" title="Hapus Pivot Fitur Perusahaan">x</button>
                                        </div>
                                    </div>

                                    <div class="form-group position-relative mb-3">
                                        <label for="" class="form-label">Judul</label>
                                        <input type="text" class="form-control" value="{{$item->judul}}" disabled>
                                    </div>
                                    <div class="form-group position-relative mb-3">
                                        <label for="" class="form-label">Deskripsi</label>
                                        <p>
                                            {{$item->deskripsi}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light text-white">Konfirmasi Hapus</button>
                        </div>
                    </div>
                </form>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="card border border-primary">
                            <div class="card-body text-primary">
                                <h5 class="card-title text-primary">Silahkan mengisi data dahulu</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <hr>
            <form class="form-horizontal" id="tambah_pivot_fitur_perusahaan_form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="position-relative form-group mb-3" id="status_tambah_pivot_fitur_perusahaan_form">
                            <label for="status_tambah_pivot_fitur_perusahaan" class="form-label">Apakah ingin menambahkan Pivot Fitur Perusahaan?</label>
                            <select id="status_tambah_pivot_fitur_perusahaan" class="form-control" required>
                                <option value="">--- Pilih ---</option>
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-12" style="text-align: right;">
                                <button class="btn btn-primary waves-effect waves-light text-right" id="btn_submit_tambah_pivot_fitur_perusahaan" disabled>Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/select2.full.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/tagify.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/singleimageupload.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/cs/dropzone.templates.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/fontawesome.min.js" integrity="sha512-j3gF1rYV2kvAKJ0Jo5CdgLgSYS7QYmBVVUjduXdoeBkc4NFV4aSRTi+Rodkiy9ht7ZYEwF+s09S43Z1Y+ujUkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var fitur_perusahaan_id = "{{$fitur_perusahaan->id}}";
        $(document).ready(function(){
            $('.dropify').dropify();
        });

        // Fitur Perusahaan

        var ID_PIVOT_FITUR_PERUSAHAAN = [];

        $('.hapus-pivot-fitur-perusahaan').click(function(){
            var id = $(this).attr('data-id');
            ID_PIVOT_FITUR_PERUSAHAAN.push(id);
            $('div .col-pivot-fitur-perusahaan#'+id).remove();
        });

        $('#edit_pivot_fitur_perusahaan_form').submit(function(e){
            e.preventDefault();
            return new swal({
                title: "Apakah Anda Yakin?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1976D2",
                confirmButtonText: "Ya"
            }).then((result)=>{
                if(result.value)
                {
                    $.ajax({
                        url: "{{ route('razen-project.admin.fitur-perusahaan.edit-fitur-perusahaan') }}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id:ID_PIVOT_FITUR_PERUSAHAAN,
                        },
                        beforeSend: function()
                        {
                            return new swal({
                                title: "Checking...",
                                text: "Harap Menunggu",
                                imageUrl: "{{ asset('/images/preloader.gif') }}",
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function(data)
                        {
                            if(data.errors)
                            {
                                Swal.fire({
                                    icon: 'error',
                                    title: data.errors,
                                    showConfirmButton: true
                                });
                            }
                            if(data.success)
                            {
                                new swal({
                                    icon: 'success',
                                    title: data.success
                                    }).then(function() {
                                        window.location.href = "{{ route('razen-project.admin.fitur-perusahaan.index') }}";
                                });
                            }
                        }
                    });
                }
            });
        });

        $('#status_tambah_pivot_fitur_perusahaan').change(function(){
            var value = $(this).val();

            if(value == 'ya')
            {
                $('#form_tambah_pivot_fitur_perusahaan').remove();
                var tambah_media_sosial_profil = $(`<div class="form-group" id="form_tambah_pivot_fitur_perusahaan">
                                                    <div class="row mb-3">
                                                        <div class="col-6 justify-content-center align-self-center text-left">
                                                            <label for="" class="control-label">Pivot Fitur Perusahaan</label>
                                                        </div>
                                                        <div class="col-6" style="text-align:right;">
                                                            <button class="btn btn-icon waves-effect waves-light btn-primary mr-2" type="button" id="btn_tambah_pivot_fitur_perusahaan"><i class="fas fa-user-plus"></i></button>
                                                            <button class="btn btn-icon waves-effect waves-light btn-danger" type="button" id="btn_hapus_pivot_fitur_perusahaan"><i class="fas fa-user-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>`);
                $('#status_tambah_pivot_fitur_perusahaan_form').after(tambah_media_sosial_profil);
                $('#btn_submit_tambah_pivot_fitur_perusahaan').prop('disabled', false);
            } else {
                $('#form_tambah_pivot_fitur_perusahaan').remove();
                $('#btn_submit_tambah_pivot_fitur_perusahaan').prop('disabled', true);
            }
        });

        var count_pivot_fitur_perusahaan = 0;
        dynamic_field_pivot_fitur_perusahaan();

        function dynamic_field_pivot_fitur_perusahaan(number_pivot_fitur_perusahaan)
        {
            var index_media_sosial = number_pivot_fitur_perusahaan - 1;
            html = '<div class="border shadow p-3 mb-3">'
            html += '<div class="form-group row">';
            html += '<div class="col-12">';
            html += '<h3>';
            html += '<span class="sw-4 sh-4 me-1 mb-1 d-inline-block bg-info d-flex justify-content-center align-items-center rounded-xl">'+number_pivot_fitur_perusahaan+'</span>';
            html += '</h3>';
            html += '</div>';
            html += '</div>';
            html += '<input type="hidden" name="data_pivot_fitur['+index_media_sosial+'][razen_project_fitur_perusahaan_id]" value="'+fitur_perusahaan_id+'">';
            html += '<div class="position-relative mb-3 form-group row">';
            html += '<label class="col-md-3 form-label">Judul</label>';
            html += '<div class="col-md-9">';
            html += '<input type="text" name="data_pivot_fitur['+index_media_sosial+'][judul]" class="form-control" required>';
            html += '</div>';
            html += '</div>';
            html += '<div class="position-relative mb-3 form-group row">';
            html += '<label class="col-md-3 form-label">Deskripsi</label>';
            html += '<div class="col-md-9">';
            html += '<textarea name="data_pivot_fitur['+index_media_sosial+'][deskripsi]" class="form-control" rows="5" required></textarea>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            if(number_pivot_fitur_perusahaan >= 1)
            {
                $('#form_tambah_pivot_fitur_perusahaan').after(html);
                $('.select-media-sosial').select2();
            }
        }

        $(document).on('click', '#btn_tambah_pivot_fitur_perusahaan', function(){
            count_pivot_fitur_perusahaan++;
            dynamic_field_pivot_fitur_perusahaan(count_pivot_fitur_perusahaan);
        });

        $(document).on('click', '#btn_hapus_pivot_fitur_perusahaan', function(){
            count_pivot_fitur_perusahaan--;
            if(count_pivot_fitur_perusahaan < 0)
            {
                count_pivot_fitur_perusahaan = 0;
            }
            $('#form_tambah_pivot_fitur_perusahaan').next('div').remove();
        });

        $('#tambah_pivot_fitur_perusahaan_form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('razen-project.admin.fitur-perusahaan.tambah-fitur-perusahaan') }}",
                method: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function()
                {
                    return new swal({
                        title: "Checking...",
                        text: "Harap Menunggu",
                        imageUrl: "{{ asset('/images/preloader.gif') }}",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function(data){
                    if(data.errors)
                    {
                        Swal.fire({
                            icon: 'errors',
                            title: data.errors,
                            showConfirmButton: true
                        });
                    }
                    if(data.success) {
                        new swal({
                            icon: 'success',
                            title: data.success,
                            }).then(function() {
                                window.location.href = "{{ route('razen-project.admin.fitur-perusahaan.index') }}";
                        });
                    }
                }
            });
        });
    </script>
@endsection
