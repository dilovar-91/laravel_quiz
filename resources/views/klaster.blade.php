

@section('title')
Саҳифаи асосӣ
@parent
@stop
@extends('layout/default')


@section('content')
 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Саҳифаи асосӣ</a>
        </li>
        <li class="breadcrumb-item active">Фанҳо</li>
        <li class="breadcrumb-item active">Кластери </li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">

      <div id="app" class="app"> 
<center>
<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-left: 60px;">
              <thead>
                <tr>
                  <th>№</th>
                  <th>Фан</th>
                  <th>Категория</th>
                 
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>№</th>
                  <th>Фан</th>
                  <th>Категория</th>
               
                </tr>
              </tfoot>
              <tbody>

                 <?php 
                 $i= 1;
      
                 foreach($data as $str) {
                   echo  '<tr>
                                   <td>'.$i.'</td>
                                   <td><a href="/sanjish/'.$str->id_fan.'/'.$str->kategoriya.'">'.$str->nomi_fan.'</a></td>
                                   
                                   <td>'.$str->kategoriya.'</td>
                                 
                                 </tr>';
                                 $i++;
                 }
                
                        ?>                               
                
  
          </tbody>
            </table></center>
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