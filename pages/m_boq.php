<?php
  include "inc.chksession.php";
  include "inc.common.php";

  $title="Tambahkan Harga Satuan";
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
        Harga Satuan Bahan
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home_pic.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Harga Satuan Bahan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Dinas Pendidikan Kota Depok</h3>
        </div>
        <!-- /.box-header -->
        <div class="col-xs-12">
          <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title"> Klik untuk menambahkan</h3>

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
                  <label> Jenis Kegiatan</label>
                  <select name="jenisbarang" class="form-control select2" style="width: 40%;">
                    <option value="">Kategori kegiatan..</option>
                    <option value="Fisik">Fisik</option>
                    <option value="NonFisik">Non Fisik</option>
                    <option value="AlatPeraga">Alat Peraga</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <!-- label> Nama Aktifitas</label -->
                  <label> Nama Barang</label>
                  <input style="border-radius: 5px;" type="text" name="namabarang" class="form-control" placeholder="Input Nama Barang...">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <!-- label> Nama Aktifitas</label -->
                  <label> Satuan Barang</label>
                  <input style="border-radius: 5px;" type="text" name="satuanbarang" class="form-control" placeholder="Input Satuan Barang...">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <!-- label> Nama Aktifitas</label -->
                  <label> Harga Satuan Barang</label>
                  <input style="border-radius: 5px;" type="text" name="hargabarang" class="form-control" placeholder="Input Harga Barang...">
                </div>
                <div class="form-group">              
                  <button style="width: 20%;" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-share-alt"></button>
                </div>
                <!-- /.form-group -->
              </form>
              <!-- /form -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12"><br/>
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div id="datatable"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
           
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div id="test" class="box-footer">
          Silahkan cek <a href="#">Panduan Pengguna</a> jika membutuhkan bantuan.
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
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
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
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
<script>
  $("#datatable").load("data/datatable.php?t=com");
</script>
</body>
</html>