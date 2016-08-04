<?php
  include "../inc.chksession.php";
  include "../inc.common.php";

  $title="Unggah Foto";
  $title1="Unggah Foto";
  $title2="Unggah Foto";
  $menu="master";
  $url = "../m_user.php";
  header("Refresh: 3;url=$url");
	include 'inc.redir.head.php';
  $actId = $_GET['id'];
  if ($actId == 0) {
    $message = "Aktifasi akun telah berhasil";
  } else {
    $message = "Deaktifasi akun telah berhasil";
  }

?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php
	include '../inc.header.php';
	include '../inc.sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aktifasi User
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Pelaksana</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-sm-3 col-xs-6">
      <!-- SELECT2 EXAMPLE -->
        <div class="callout callout-success">
          <h4><?php echo $message; ?></h4>

          <p>Anda akan kembali ke halaman Manajemen User.</p>
          <div style="text-align:center; margin: 15px 0px;">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
            <span class="sr-only">Loading...</span>
          </div>
          <p>Klik disini jika anda tidak kembali ke halaman Manajemen User dalam 3 detik.<br />
              <a href='<?php echo $url; ?>'>Manajemen User</a>
          </p>
        </div>
      </div>
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
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>