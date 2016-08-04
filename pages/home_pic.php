<?php
  include 'inc.chksession.php';
	
  $title="Dashboard";
  $title1="Unggah Foto";
  $title2="Unggah Foto";
  $menu="master";

  include 'inc.head.php';

?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
	include 'inc.header.php';
	include 'inc.sidebar.php';
  include 'data/pop_usdashboard.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home_pic.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">       
        <!-- Left Col -->
        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-purple">
            <span class="info-box-icon"><a style="color:white;" href="us_dashboard1.php"><i class="ion-clipboard"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Proyek</span>
              <span class="info-box-number"><?php echo $jumlahProyek; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-orange">
            <span class="info-box-icon"><a style="color:white;" href="us_dashboard2.php"><i class="ion-stats-bars"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Perkembangan Proyek</span>
              <span class="info-box-number"><?php echo $ratioProgress; ?> %</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
                    Meningkat 50% dalam 30 Hari
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><a style="color:white;" href="us_dashboard3.php"><i class="ion-clock"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Melampaui Tenggat Waktu</span>
              <span class="info-box-number"><?php echo $countDiff; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Menurun 20% dari Bulan Lalu
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green disabled">
            <span class="info-box-icon"><a style="color:white;" href="us_dashboard4.php"><i class="ion-thumbsup"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Proyek Selesai</span>
              <span class="info-box-number"><?php echo $countProjectDone; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <span class="progress-description">
                    Meningkat 40% dari Bulan Lalu
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- Right col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Proyek Sedang Berjalan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="datatable"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Proyek</a>
            </div>
            <!-- /.box-footer -->
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
	#include 'inc.controlsidebar.php';
?>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- -->
<script>
  $("#datatable").load("data/u_dt_dashboard.php?t=dash5");
</script>
</body>
</html>