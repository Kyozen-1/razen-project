@extends('razen-project.admin.layouts.app')
@section('title', 'Admin - Razen Project | Tim')

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
            <h1 class="mb-0 pb-0 display-4" id="title">Tim | Edit</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('razen-project.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('razen-project.admin.tim.index') }}">Tim</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                </ul>
            </nav>
        </div>
        <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->
    <form action="{{ route('razen-project.admin.tim.update',['id' => $razen_project_section_tim->id]) }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6" style="justify-content: center; align-self: center;">
                        <label for="" class="small-title">Tambah Pegawai</label>
                    </div>
                    <div class="col-6" style="text-align:right">
                        <a href="{{ route('razen-project.admin.tim.index') }}" class="btn btn-danger btn-icon waves-effect waves-light"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="mb-3 position-relative form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$razen_project_section_tim->nama}}" required>
                </div>
                <div class="mb-3 position-relative form-group">
                    <label for="master_jabatan_tim_id" class="form-label">Jabatan</label>
                    <select name="master_jabatan_tim_id" id="master_jabatan_tim_id" class="form-control" required>
                        <option value="">--- Pilih Jabatan ---</option>
                        @foreach ($jabatan as $id => $nama)
                            <option value="{{$id}}" @if($razen_project_section_tim->master_jabatan_tim_id == $id) selected @endif>{{$nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 position-relative form-group">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="dropify" name="gambar" data-height="150" data-allowed-file-extensions="png jpg jpeg webp" data-show-errors="true" data-default-file="{{ asset('images/razen-project/gambar-tim/'.$razen_project_section_tim->gambar) }}" required>
                </div>
            </div>
        </div>
        @if ($pivot['status'] == 'ada')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="div_pivot">
                                <table class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="30%">Media Sosial</th>
                                            <th width="50%">Tautan</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $a = 1;
                                        @endphp
                                        @foreach ($pivot['data'] as $item)
                                            <tr>
                                                <td class="text-left">
                                                    {{$a++}}
                                                    <input type="hidden" name="edit_data_tim[{{$a}}][pivot_razen_project_section_tim_media_sosial_id]" value="{{$item->id}}">
                                                </td>
                                                <td class="text-left">
                                                    <select name="edit_data_tim[{{$a}}][master_media_sosial_id]" class="form-control" required>
                                                        @foreach ($media_sosial as $id => $nama)
                                                            <option value="{{$id}}" @if($item->master_media_sosial_id == $id) selected @endif>{{$nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="text-left">
                                                    <input type="text" class="form-control" name="edit_data_tim[{{$a}}][tautan]" value="{{$item->tautan}}">
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger hapus-data-tim" type="button" aria-hidden="true" data-id="{{$item->id}}" title="Hapus">Hapus</button>
                                                </td>
                                            </tr>
                                            @php
                                                $a++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="hapus_id_pivot" id="hapus_id_pivot">
                    <div class="form-group" id="form_tambah_media_sosial_profil">
                        <div class="row mb-3">
                            <div class="col-6 justify-content-center align-self-center text-left">
                                <label for="" class="control-label">Tambah Media Sosial</label>
                            </div>
                            <div class="col-6" style="text-align:right;">
                                <button class="btn btn-icon waves-effect waves-light btn-primary mr-2" type="button" id="btn_tambah_media_sosial_tim"><i class="fas fa-user-plus"></i></button>
                                <button class="btn btn-icon waves-effect waves-light btn-danger" type="button" id="btn_hapus_media_sosial_tim"><i class="fas fa-user-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12" style="text-align: right">
                        <button class="btn btn-outline-primary waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    var mediaSosialOption = '@foreach ($media_sosial as $id => $nama) <option value="{{$id}}">{{$nama}}</option> @endforeach';
    $(document).ready(function(){
        $('#master_jabatan_tim_id').select2();
        $('.dropify').dropify();
    });

    var ID_PIVOT = [];

    $('.hapus-data-tim').click(function() {
        var id = $(this).attr('data-id');
        var _t = $(this);
        ID_PIVOT.push(id);
        $('#hapus_id_pivot').val(ID_PIVOT);
        _t.parent().parent().remove();
    });

    var count_media_sosial = 0;
    dynamic_field_media_sosial();

    function dynamic_field_media_sosial(number_media_sosial)
    {
        var index_media_sosial = number_media_sosial - 1;
        html = '<div class="border shadow p-3 mb-3">'
        html += '<div class="form-group row">';
        html += '<div class="col-12">';
        html += '<h3>';
        html += '<span class="sw-4 sh-4 me-1 mb-1 d-inline-block bg-info d-flex justify-content-center align-items-center rounded-xl">'+number_media_sosial+'</span>';
        html += '</h3>';
        html += '</div>';
        html += '</div>';
        html += '<div class="position-relative mb-3 form-group row">';
        html += '<label class="col-md-3 col-form-label">Media Sosial</label>';
        html += '<div class="col-md-9">';
        html += '<select name="data_media_sosial['+index_media_sosial+'][master_media_sosial_id]" class="form-control select-media-sosial" id="select-media-sosial_'+number_media_sosial+'">';
        html += mediaSosialOption;
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="position-relative mb-3 form-group row">';
        html += '<label class="col-md-3 form-label">Tautan</label>';
        html += '<div class="col-md-9">';
        html += '<input type="text" name="data_media_sosial['+index_media_sosial+'][tautan]" class="form-control" required>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        if(number_media_sosial >= 1)
        {
            $('#form_tambah_media_sosial_profil').after(html);
            $('.select-media-sosial').select2();
        }
    }

    $(document).on('click', '#btn_tambah_media_sosial_tim', function(){
        count_media_sosial++;
        dynamic_field_media_sosial(count_media_sosial);
    });

    $(document).on('click', '#btn_hapus_media_sosial_tim', function(){
        count_media_sosial--;
        if(count_media_sosial < 0)
        {
            count_media_sosial = 0;
        }
        $('#form_tambah_media_sosial_profil').next('div').remove();
    });
</script>
@endsection
