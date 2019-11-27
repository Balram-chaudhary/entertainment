<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$title}} </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" href="{{asset('/js/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{asset('/css/blue.css') }}">
</head>
    <body class="hold-transition login-page">
        @yield('content')
<script src="{{asset('/plugins/jQuery/jquery-3.2.1.min.js') }}"></script>
<script src="{{asset('/js/bootstrap.min.js') }}"></script>
<script src="{{asset('/js/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>   
    </body>
</html>
