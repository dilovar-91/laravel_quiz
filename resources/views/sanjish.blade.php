
@section('title')
Home
@parent
@stop
@extends('layout/default')


@section('content')
 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Санҷишҳо</a>
        </li>
        <li class="breadcrumb-item active">Санҷиш аз фанни <?=$fan['nomi_fan']?></li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">

      <div id="app" class="app">
<?php if (!empty($fan)){ ?>

 <Sanjish id_fan="<?=$id_fan?>" kat = "<?=$kat?>" nomi_fan="<?=$fan['nomi_fan']?>" ></Sanjish>
<?php } 
else echo '<center><h1 >Чунин фан мавҷуд нест!!</h1> </center>';; ?>
        </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  
  @stop