<?php
  include "inc.chksession.php";
  include "inc.common.php";

  $title="Daftar Foto Kegiatan";
  $title1="Daftar Foto Kegiatan";
  $title2="Daftar Foto Kegiatan";
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
        Daftar Foto Kegiatan
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Foto Kegiatan</li>
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
  $("#datatable").load("data/datatable_photo.php?t=photo");
</script>
</body>
</html>