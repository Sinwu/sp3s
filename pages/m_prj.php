<?php
  include "inc.chksession.php";
  include "inc.common.php";

  $title="Daftar Proyek";
  $title1="Daftar Proyek";
  $title2="Daftar Proyek";
  $menu="master";

	include 'inc.head.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
	include 'inc.header.php';
	include 'inc.sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Proyek
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Proyek</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Dinas Pendidikan Kota Depok</h3>
            </div>
            <!-- /.box-header -->
            <div class="col-md-6">
              <!-- fill left side -->
            </div>
            <div class="col-md-6">
              <div class="box box-warning collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i> Klik untuk menambahkan</i></h3>

                  <div class="box-tools pull-right">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form method="POST" action="data/add_com.php">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label> ID Proyek</label>
                          <input style="border-radius: 5px;" type="text" name="namabarang" class="form-control" placeholder="Input Id Proyek...">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label> Nama Proyek</label>
                          <input style="border-radius: 5px;" type="text" name="namabarang" class="form-control" placeholder="Input Nama Proyek...">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label> Batas Atas Anggaran</label>
                          <input style="border-radius: 5px;" type="text" name="namabarang" class="form-control" placeholder="Input Batas Atas Anggaran...">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label> Pelaksana</label>
                          <select name="jenisbarang" class="form-control select2" style="width: 100%;">
                            <option value="">Email Pelaksana..</option>
                            <option value="Fisik">Fisik</option>
                            <option value="NonFisik">Non Fisik</option>
                            <option value="AlatPeraga">Alat Peraga</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label>Mulai ~ Selesai</label>

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservation">
                          </div>
                          <!-- /.input group -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          sd
                        </div>
                      </div>
                    </div>

                  </form>
                  <!-- /form -->
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="box-body">
              <div id="datatable"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
	include 'inc.controlsidebar.php';
?>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>  
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $("#datatable").load("data/datatable.php?t=prj");
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
</body>
</html>