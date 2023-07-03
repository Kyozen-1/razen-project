@extends('razen-project.admin.layouts.app')
@section('title', 'Admin - Razen Project | Tentang Perusahaan')

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
            <h1 class="mb-0 pb-0 display-4" id="title"> Tentang Perusahaan</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('razen-project.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('razen-project.admin.tentang-perusahaan.index') }}">Tentang Perusahaan</a></li>
                </ul>
            </nav>
        </div>
        <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('razen-project.admin.tentang-perusahaan.store') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-6" style="justify-content: center; align-self: center;">
                        <label for="" class="small-title">Atur Tentang Perusahaan</label>
                    </div>
                    <div class="col-6" style="text-align: right">
                        <a href="{{ route('perusahaan') }}#shortcode-5" class="btn btn-icon waves-effect waves-light btn-secondary mr-1" target="blank"><i class="fas fa-pager"></i> Preview</a>
                        <button class="btn btn-outline-primary waves-effect waves-light">Simpan Perubahan</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="mb-3 position-relative form-group">
                            <label for="about" class="form-label">Tentang Razen Project</label>
                            <textarea name="about" id="about" rows="5" class="form-control" required>{{$about?$about->about:''}}</textarea>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="misi" class="form-label">Misi Kami</label>
                            <textarea name="misi" id="misi" rows="5" class="form-control" required>{{$about?$about->misi : ''}}</textarea>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <textarea name="tujuan" id="tujuan" rows="5" class="form-control" required>{{$about?$about->tujuan : ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3 position-relative form-group">
                            <label for="gambar" class="form-label">Gambar</label>
                            @php
                                if($about)
                                {
                                    $gambar = $about->gambar;
                                } else {
                                    $gambar = 'example.jpg';
                                }
                            @endphp
                            <input type="file" class="dropify" name="gambar" data-height="300" data-allowed-file-extensions="png jpg jpeg webp" data-default-file="{{ asset('images/razen-project/gambar-tentang-perusahaan/'.$gambar) }}" data-show-errors="true" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($pivot_razen_project_about['status'] == 'ada')
                <form action="edit_pivot_about_form" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        @php
                            $a = 1;
                        @endphp
                        @foreach ($pivot_razen_project_about['pivot'] as $item)
                            <div class="col-12 col-md-4 col-pivot-about" id="{{$item->id}}">
                                <div class="border shadow p-3 mb-3">
                                    <div class="row mb-3">
                                        <div class="col-10">
                                            <label class="form-label">No: {{$a++}}</label>
                                        </div>
                                        <div class="col-2">
                                            <button class="close hapus-pivot-about" type="button" aria-hidden="true" data-id="{{$item->id}}" title="Hapus">x</button>
                                        </div>
                                    </div>

                                    <div class="form-group position-relative mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" value="{{$item->judul}}" disabled>
                                    </div>
                                    <div class="form-group position-relative mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" value="{{$item->deskripsi}}" disabled>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-danger waves-effect waves-light" type="button" id="btn_konfirmasi_hapus">Konfirmasi Hapus</button>
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
            <form class="form-horizontal" id="tambah_pivot_about_form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="position-relative form-group mb-3" id="status_tambah_pivot_about_form">
                            <label for="status_tambah_pivot_about" class="form-label">Apakah ingin menambahkan Pivot About?</label>
                            <select id="status_tambah_pivot_about" class="form-control" required>
                                <option value="">--- Pilih ---</option>
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-12" style="text-align: right;">
                                <button class="btn btn-primary waves-effect waves-light text-right" id="btn_submit_tambah_pivot_about" disabled>Simpan</button>
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
        var razen_project_about_id = "{{$about->id}}";
        $(document).ready(function(){
            $('.dropify').dropify({
                messages: {
                    'default': '',
                    'replace': '',
                    'error':   'Ooops, sesuatu yang salah terjadi.'
                }
            });
        });

        var ID_PIVOT_ABOUT = [];

        $('.hapus-pivot-about').click(function(){
            var id = $(this).attr('data-id');
            ID_PIVOT_ABOUT.push(id);
            $('div .col-pivot-about#'+id).remove();
        });

        $('#btn_konfirmasi_hapus').click(function(e){

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
                        url: "{{ route('razen-project.admin.tentang-perusahaan.edit_pivot_about') }}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id:ID_PIVOT_ABOUT,
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
                                        window.location.href = "{{ route('razen-project.admin.tentang-perusahaan.index') }}";
                                });
                            }
                        }
                    });
                }
            });
        });

        $('#status_tambah_pivot_about').change(function(){
            var value = $(this).val();

            if(value == 'ya')
            {
                $('#form_tambah_pivot_about').remove();
                var tambah_pivot_about = $(`<div class="form-group" id="form_tambah_pivot_about">
                                                    <div class="row mb-3">
                                                        <div class="col-6 justify-content-center align-self-center text-left">
                                                            <label for="" class="control-label">Tambah Pivot About</label>
                                                        </div>
                                                        <div class="col-6" style="text-align:right;">
                                                            <button class="btn btn-icon waves-effect waves-light btn-primary mr-2" type="button" id="btn_tambah_pivot_about"><i class="fas fa-user-plus"></i></button>
                                                            <button class="btn btn-icon waves-effect waves-light btn-danger" type="button" id="btn_hapus_pivot_about"><i class="fas fa-user-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>`);
                $('#status_tambah_pivot_about_form').after(tambah_pivot_about);
                $('#btn_submit_tambah_pivot_about').prop('disabled', false);
            } else {
                $('#form_tambah_pivot_about').remove();
                $('#btn_submit_tambah_pivot_about').prop('disabled', true);
            }
        });

        var count_pivot_about = 0;
        dynamic_field_pivot_about();

        function dynamic_field_pivot_about(number_pivot_about)
        {
            var index_pivot_about = number_pivot_about - 1;
            html = '<div class="border shadow p-3 mb-3">'
            html += '<div class="form-group row">';
            html += '<div class="col-12">';
            html += '<h3>';
            html += '<span class="sw-4 sh-4 me-1 mb-1 d-inline-block bg-info d-flex justify-content-center align-items-center rounded-xl">'+number_pivot_about+'</span>';
            html += '</h3>';
            html += '</div>';
            html += '</div>';
            html += '<input type="hidden" name="data_pivot_about['+index_pivot_about+'][razen_project_about_id]" value="'+razen_project_about_id+'">';
            html += '<div class="position-relative mb-3 form-group row">';
            html += '<label class="col-md-3 form-label">Judul</label>';
            html += '<div class="col-md-9">';
            html += '<input type="text" name="data_pivot_about['+index_pivot_about+'][judul]" class="form-control" required>';
            html += '</div>';
            html += '</div>';
            html += '<div class="position-relative mb-3 form-group row">';
            html += '<label class="col-md-3 form-label">Deskripsi</label>';
            html += '<div class="col-md-9">';
            html += '<textarea name="data_pivot_about['+index_pivot_about+'][deskripsi]" class="form-control" rows="5" required></textarea>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            if(number_pivot_about >= 1)
            {
                $('#form_tambah_pivot_about').after(html);
            }
        }

        $(document).on('click', '#btn_tambah_pivot_about', function(){
            count_pivot_about++;
            dynamic_field_pivot_about(count_pivot_about);
        });

        $(document).on('click', '#btn_hapus_pivot_about', function(){
            count_pivot_about--;
            if(count_pivot_about < 0)
            {
                count_pivot_about = 0;
            }
            $('#form_tambah_pivot_about').next('div').remove();
        });

        $('#tambah_pivot_about_form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('razen-project.admin.tentang-perusahaan.add_pivot_about') }}",
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
                                window.location.href = "{{ route('razen-project.admin.tentang-perusahaan.index') }}";
                        });
                    }
                }
            });
        });
    </script>
@endsection
