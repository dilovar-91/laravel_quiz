<!doctype html>
<html lang="{{ app()->getLocale() }}">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> 
    	@section('title')
        | Системаи санҷиши довталабон
        @show
    </title>
  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/app.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" />
  <link rel="stylesheet" href="{{asset('css/sb-admin.css')}}" />
 
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  @include('header')
  @yield('content')
  @include('footer')
   
</body>

</html>
