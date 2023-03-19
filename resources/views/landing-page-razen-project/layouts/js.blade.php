<!-- Footer Scripts
============================================= -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<script src="{{ asset('razen-project/assets/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('razen-project/assets/js/plugins.js?v=1.0.0') }}"></script>
<script src="{{ asset('razen-project/assets/js/functions.js?v=1.2.0') }}"></script>
<script id="sbinit" src="{{env('RAZEN_URL')}}supportboard/js/main.js?lang=id"></script>
@yield('js')
