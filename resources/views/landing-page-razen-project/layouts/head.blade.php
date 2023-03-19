<!-- Document Meta
============================================= -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--IE Compatibility Meta-->
<meta name="author" content="razen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="construction html5 template">
<link href="{{ asset('razen-project/assets/favicon.png') }}" rel="icon">

<!-- Fonts
============================================= -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CRaleway:100,200,300,400,500,600,700,800%7CDroid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

<!-- Stylesheets
============================================= -->
<link href="{{ asset('razen-project/assets/css/external.css') }}" rel="stylesheet">
<!-- Extrnal CSS -->
<link href="{{ asset('razen-project/assets/css/bootstrap.min.css') }}" rel="stylesheet">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<!-- Boostrap Core CSS -->
<link href="{{ asset('razen-project/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('razen-project/assets/css/dark.css') }}" rel="stylesheet">
<!-- Style CSS -->

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
    <script src="razen-project/assets/js/html5shiv.js"></script>
    <script src="razen-project/assets/js/respond.min.js"></script>
    <![endif]-->

<!-- Document Title
    ============================================= -->
<title>{{$profil->nama}}</title>
@yield('css')
