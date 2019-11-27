<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="_token" content="{{ csrf_token() }}">
  <title>Nepal yatra</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
  <link rel="stylesheet" href="{{asset('/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/datepicker3.css')}}">
  <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
 @yield('header_resources')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="loading"></div>
  <div class="wrapper">
@yield('content')
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2017 <a href="http://spicesresearch.com/">nepalyatra.com</a>.</strong> All rights
    reserved.
  </footer>
</div>

<script src="{{asset('/plugins/jQuery/jquery-3.2.1.min.js')}}"></script>
Bootstrap 3.3.7
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
 
<!-- SlimScroll -->
<script src="{{asset('/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/js/adminlte.min.js')}}"></script>
<script src="{{asset('/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/js/demo.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    });

    </script>

{{-- <script>
 $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script> --}}
<script>
jQuery(document).ready(function() {
    jQuery('#loading').fadeOut(1000);
});
</script>
 @yield('footer_resources')
</body>
</html>