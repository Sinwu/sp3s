<?php
  include "inc.chksession.php";
  include "inc.common.php";

  $title="Unggah Foto";
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
  include 'data/pop_upl.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Unggah Foto
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home_pic.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="us_prj.php">Pilih Proyek</a></li>
        <li class="active">Unggah Foto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo $namaAktifitas; ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
            <form method="POST" action="data/_uploadfile.php?milid=<?php echo $milestoneId;?>" enctype="multipart/form-data">               
              <!-- /.form-group -->
              <div class="form-group">
                <!-- label> Nama Aktifitas</label -->
                <input style="border-radius: 5px;" type="text" name="aktifitas" class="form-control" placeholder="Nama Aktifitas ...">
                <!--input style="border-radius: 5px;" type="file" name="aktifitas[]" id="exampleInputFile" multiple=""-->
              </div>
              <!-- /.form-group -->
              <!-- Box upload aktifitas -->
              <div class="box box-warning collapsed-box">
                <div class="box-header with-border">
                  <i>Unggah Foto Aktifitas</i>

                  <div class="box-tools pull-right">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <input style="border-radius: 5px;" type="file" name="aktifitas[]" id="exampleInputFile">
                  <input style="border-radius: 5px;" type="file" name="aktifitas[]" id="exampleInputFile">
                  <input style="border-radius: 5px;" type="file" name="aktifitas[]" id="exampleInputFile">
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <!-- box upload biaya -->
              <div class="box box-warning collapsed-box">
                <div class="box-header with-border">
                  <i>Unggah Bukti Pembayaran</i>

                  <div class="box-tools pull-right">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <input style="border-radius: 5px;" type="text" name="biaya" class="form-control" placeholder="Total Biaya ...">
                  <input style="border-radius: 5px;" type="file" name="bukti[]" id="exampleInputFile">
                  <!--input style="border-radius: 5px;" type="file" name="bukti2" id="exampleInputFile">
                  <input style="border-radius: 5px;" type="file" name="bukti3" id="exampleInputFile"-->
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <div class="form-group">
                <textarea style="border-radius: 5px;" name="deskripsi" class="form-control" rows="2" placeholder="Deskripsi ..."></textarea>
              </div>
              <!-- /.form-group -->
              <div class="form-group">              
                <button style="width: 20%;" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-cloud-upload"></button>
              </div>
              <!-- /.form-group -->
            </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div id="test" class="box-footer">
          <i>Max file size 2MB. File yang diizinkan hanya .jpeg .jpg .png</i>
          <br/>
          Silahkan cek <a href="#">Panduan Pengguna</a> jika membutuhkan bantuan.
        </div>
      </div>
      <!-- /.box -->
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
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Interaction
    
    //End of Interaction

    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function($) {
    //Validasi Form

  });
</script>
</body>
</html>