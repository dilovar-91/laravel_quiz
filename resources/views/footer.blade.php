<!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Ҳамаи ҳуқуқҳо ҳимоя шудаанд © Системаи санҷиши довталабон <?=date('Y');?></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Оё Шумо баромадан мехоҳед?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Барои ба анҷом расонидани сессия тугмаи "Баромадан" - ро пахш кунед.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Бекоркунӣ</button>
            <a class="btn btn-primary" href="<?=URL::to('/logout'); ?>">Баромадан</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
   
    <!-- Core plugin JavaScript-->

    <!-- Page level plugin JavaScript-->
	<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
	<script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
	<script src="{{asset('js/sb-admin.min.js')}}"></script>
	<script src="{{asset('js/sb-admin-datatables.min.js')}}"></script>
	<script src="{{asset('js/sb-admin-charts.min.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>