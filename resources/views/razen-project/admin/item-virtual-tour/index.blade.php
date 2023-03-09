@extends('razen-project.admin.layouts.app')
@section('title', 'Admin - Razen Project | Item Virtual Tour')

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
            <h1 class="mb-0 pb-0 display-4" id="title"> Item Virtual Tour</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('razen-project.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('razen-project.admin.item-virtual-tour.index') }}">Item Virtual Tour</a></li>
                </ul>
            </nav>
        </div>
        <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <!-- Content Start -->
    <div class="row mb-3">
        <div class="col-12" style="text-align:right">
            <button class="btn btn-outline-primary waves-effect waves-light mr-2 item_create" type="button" data-bs-toggle="modal" data-bs-target="#addEditItemModal" title="Tambah Data"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <div class="data-table-rows slim">
        <!-- Table Start -->
        <div class="data-table-responsive-wrapper">
            <table id="item_virtual_tour_table" class="data-table w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Thumb</th>
                        <th>Kategori Proyek</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Table End -->
    </div>
    <!-- Content End -->
    <div id="addEditItemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addEditItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addEditItemModalLabel">Tambah Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form class="form-horizontal" id="item_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3 position-relative">
                            <label for="master_kategori_project_id" class="form-label">Kategori Proyek</label>
                            <select class="form-select" id="master_kategori_project_id" name="master_kategori_project_id" required>
                                <option value="">--- Pilih Kategori Proyek ---</option>
                                @foreach ($kategori_project as $id => $nama)
                                    <option value="{{$id}}">{{$nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" name="link" id="link" class="form-control" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="kode_embed" class="form-label">Kode Embed</label>
                            <textarea name="kode_embed" id="kode_embed" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="thumb" class="form-label">Thumb</label>
                            <input type="file" name="thumb" id="thumb" class="dropify" data-height="150" data-allowed-file-extensions="png jpeg jpg" data-show-errors="true">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect width-md waves-light" data-dismiss="modal">Close</button>
                    <input type="hidden" name="aksi" id="aksi" value="Save">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <button type="submit" name="aksi_button" id="aksi_button" class="btn btn-primary waves-effect width-md waves-light">Save</button>
                </div>
            </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detail-title">Detail Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_kategori_project" class="form-label">Kategori Proyek</label>
                        <input type="text" id="detail_kategori_project" class="form-control" disabled>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_nama" class="form-label">Nama</label>
                        <input type="text" id="detail_nama" class="form-control" disabled>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_deskripsi" class="form-label">Deskripsi</label>
                        <textarea id="detail_deskripsi" rows="5" class="form-control" disabled></textarea>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_link" class="form-label">Link</label>
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" id="detail_link" disabled>
                            </div>
                            <div class="col-4">
                                <a class="btn btn-primary btn-icon waves-effect waves-light" id="btn_coba_virtual" target="blank">Coba</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_kode_embed" class="form-label">Kode Embed</label>
                        <textarea id="detail_kode_embed" rows="5" class="form-control" disabled></textarea>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_thumb" class="form-label">Thumb</label>
                        <img src="" alt="" id="detail_thumb" class="img-fluid">
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center" style="margin: 0;">Apakah anda yakin menghapus?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger waves-effect width-md waves-light">Ok</button>
                    <button class="btn btn-primary waves-effect width-md waves-light" type="button" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
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
        $(document).ready(function(){
            $('.dropify').dropify();

            $('#master_kategori_project_id').select2({
                dropdownParent: $("#addEditItemModal")
            });

            var dataTables = $('#item_virtual_tour_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('razen-project.admin.item-virtual-tour.index') }}"
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'thumb',
                        name: 'thumb'
                    },
                    {
                        data: 'master_kategori_project_id',
                        name: 'master_kategori_project_id'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ]
            });
        });

        $('#create').click(function(){
            $('#item_form')[0].reset();
            $('.dropify-clear').click();
            $("[name='master_kategori_project_id']").val('').trigger('change');
            $('#aksi_button').text('Save');
            $('#aksi_button').prop('disabled', false);
            $('.modal-title').text('Add Data');
            $('#aksi_button').val('Save');
            $('#aksi').val('Save');
            $('#form_result').html('');
        });

        $('#item_form').on('submit', function(e){
            e.preventDefault();
            if($('#aksi').val() == 'Save')
            {
                $.ajax({
                    url: "{{ route('razen-project.admin.item-virtual-tour.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">'+data.errors+'</div>';
                            $('.dropify-clear').click();
                            $("[name='master_kategori_project_id']").val('').trigger('change');
                            $('#aksi_button').prop('disabled', false);
                            $('#aksi_button').text('Save');
                        }
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">'+data.success+'</div>';
                            $('.dropify-clear').click();
                            $("[name='master_kategori_project_id']").val('').trigger('change');
                            $('#aksi_button').prop('disabled', false);
                            $('#item_form')[0].reset();
                            $('#aksi_button').text('Save');
                            $('#item_virtual_tour_table').DataTable().ajax.reload();
                        }

                        $('#form_result').html(html);
                    }
                });
            }
            if($('#aksi').val() == 'Edit')
            {
                $.ajax({
                    url: "{{ route('razen-project.admin.item-virtual-tour.update') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">'+data.errors+'</div>';
                            $('#aksi_button').text('Save');
                        }
                        if(data.success)
                        {
                            $('#item_form')[0].reset();
                            $('#aksi_button').prop('disabled', false);
                            $('#aksi_button').text('Save');
                            $('#item_virtual_tour_table').DataTable().ajax.reload();
                            $('#addEditItemModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil di ubah',
                                showConfirmButton: true
                            });
                        }

                        $('#form_result').html(html);
                    }
                });
            }
        });

        $(document.body).on('click', '.detail', function(){
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ url('/razen-project/item-virtual-tour/detail/') }}" + '/' + id,
                dataType: "json",
                success: function(data)
                {
                    $('#detail-title').text('Detail Data');
                    $('#detail_nama').val(data.result.nama);
                    $('#detail_deskripsi').val(data.result.deskripsi);
                    $('#detail_kode_embed').val(data.result.kode_embed);
                    $('#detail_link').val(data.result.link);
                    $('#btn_coba_virtual').attr('src', data.result.link);
                    $("#detail_kategori_project").val(data.result.kategori_project);
                    $('#detail_thumb').attr('src', "{{ asset('images/razen-project/item-virtual-tour') }}" + '/' + data.result.thumb);
                    $('#detail').modal('show');
                }
            });
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('/razen-project/item-virtual-tour/edit') }}"+'/'+id,
                dataType: "json",
                success: function(data)
                {
                    $('#nama').val(data.result.nama);
                    $('#deskripsi').val(data.result.deskripsi);
                    $('#link').val(data.result.link);
                    $('#kode_embed').val(data.result.kode_embed);
                    $("[name='master_kategori_project_id']").val(data.result.master_kategori_project_id).trigger('change');
                    var lokasi_thumb = "{{ asset('images/razen-project/item-virtual-tour') }}"+'/'+data.result.thumb;
                    var fileDropperThumb = $("#thumb").dropify();

                    fileDropperThumb = fileDropperThumb.data('dropify');
                    fileDropperThumb.resetPreview();
                    fileDropperThumb.clearElement();
                    fileDropperThumb.settings['defaultFile'] = lokasi_thumb;
                    fileDropperThumb.destroy();
                    fileDropperThumb.init();

                    $('#hidden_id').val(id);
                    $('.modal-title').text('Edit Data');
                    $('#aksi_button').text('Edit');
                    $('#aksi_button').prop('disabled', false);
                    $('#aksi_button').val('Edit');
                    $('#aksi').val('Edit');
                    $('#addEditItemModal').modal('show');
                }
            });
        });

        var user_id;
        $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('.modal-title').text('Konfirmasi');
            $('#ok_button').prop('disabled', false);
            $('#confirmModal').modal('show');
            $('#ok_button').text('Ok');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url: "{{ url('/razen-project/item-virtual-tour/destroy') }}"+'/'+user_id,
                beforeSend: function(){
                    $('#ok_button').text('Deleting....');
                    $('#ok_button').prop('disabled', true);
                },
                success: function(data)
                {
                    $('#ok_button').prop('disabled', false);
                    $('#confirmModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil di hapus',
                        showConfirmButton: true
                    });
                    $('#item_virtual_tour_table').DataTable().ajax.reload();
                }
            });
        });
    </script>
@endsection
