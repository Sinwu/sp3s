<?php
  include "inc.chksession.php";
  include "inc.common.php";

  $title="Batas Biaya per Aktifitas";
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
  include 'data/pop_prj2.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Batas Biaya per Aktifitas
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home_pic.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Batas Biaya per Aktifitas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> Dinas Pendidikan Kota Depok</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
            <form method="POST" action="data/assign_cost.php">
              <div class="form-group">
                <label> Proyek</label>
                <select id="proyek" name="proyek" class="form-control select2" style="width: 100%;">
                  <option value="" selected="selected">Pilih Proyek..</option>
                  <?php
                    $no = 1;
                    for ($i=0; $i < count($listProyekId_arr); $i++) { 
                        echo '<option value="'.$listProyekId_arr[$i].'">'.$listProyekData_arr[$i]['nama_proyek'].'</option>';
                      }
                  ?>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label> Tahapan</label>
                <select id="proses" name="proses" class="form-control select2" style="width: 100%;">
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label> Aktifitas</label>
                <select id="milestone" name="milestone" class="form-control select2" style="width: 100%;">
                </select>
              </div>
              <div class="form-group">
                <label> Anggaran</label>
                <input style="border-radius: 5px;" type="text" name="anggaran" class="form-control" placeholder="Input Anggaran Aktifitas...">
              </div>
              <div class="form-group">              
                <button style="width: 20%;" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-share-alt"></button>
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


    var list_target_id1 = 'proses'; //first select list ID
    var list_target_id2 = 'milestone '; //second select list ID
    var list_select_id = 'proyek'; //start select list ID

    //var reset_button = $("#reset_button");
    var initial_select_html = '<option value="" selected="selected">Pilih Proyek..</option>'; //Initial prompt for first select
    var initial_target_html1 = '<option value="" selected="selected">Pilih Tahapan..</option>'; //Initial prompt for target1 select
    var initial_target_html2 = '<option value="" selected="selected">Pilih Aktifitas..</option>'; //Initial prompt for target2 select
   
    $('#'+list_target_id1).html(initial_target_html1); //Give the target select the prompt option
    $('#'+list_target_id2).html(initial_target_html2); //Give the target select the prompt option

    // Fill second select function
    $('#'+list_select_id).change(function(e) {
      
      $('#'+list_target_id2).html(initial_target_html2); //Reset the third select value
      //Grab the chosen value on first select list change
      var selectvalue1 = $(this).val();

      //Display 'loading' status in the target select list
      $('#'+list_target_id1).html('<option value="">Loading...</option>');
   
      if (selectvalue1 == "") {
          //Display initial prompt in target select if blank value selected
         $('#'+list_target_id1).html(initial_target_html1);
         
      } else {

        //Make AJAX request, using the selected value as the GET
        $.ajax({url: 'data/process_form.php?svalue='+selectvalue1,
              success: function(output) {

                //alert(output);
                $('#'+list_target_id1).html(output);
              },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status + " "+ thrownError);
            }});
          }

        // Fill second select function
        $('#'+list_target_id1).change(function(e) {
      
        //Grab the chosen value on first select list change
        var selectvalue2 = $(this).val();
        
        //Display 'loading' status in the target select list
        $('#'+list_target_id2).html('<option value="">Loading...</option>');
     
        if (selectvalue2 == "") {
            //Display initial prompt in target select if blank value selected
            $('#'+list_target_id2).html(initial_target_html2);
        } else {

          //Make AJAX request, using the selected value as the GET
          $.ajax({url: 'data/process_form2.php?svalue='+selectvalue2,
                success: function(output) {

                  //alert(output);
                  $('#'+list_target_id2).html(output);
                },
              error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " "+ thrownError);
              }});
            }
        });
      });
      
  });
</script>
</body>
</html>