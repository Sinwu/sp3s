<?php
include 'inc.db.php';

$t="";
$sql="";
$cap="";
if(isset($_GET['t'])){$t=$_GET['t'];}
$new=true;
$edit_lnk="data.php";
switch($t){
	case "mbl_user": $sql="SELECT user_id, nama, if(flag_activation=1,'Sudah Aktif','Belum Aktif'), created_at from tbl_user where user_access='pelaksana' order by flag_activation";
	$cap="Email, Nama Pengguna, Status, Waktu Registrasi,Action";
	$edit_lnk="a_userec2.php";
	$act_lnk="data/act_user.php";
	break;
	case "kons_user": $sql="SELECT user_id, nama, if(flag_activation=1,'Sudah Aktif','Belum Aktif'), created_at from tbl_user where user_access='konsultan' order by flag_activation";
	$cap="Email, Nama Pengguna, Status, Waktu Registrasi,Action";
	$edit_lnk="a_userec2.php";
	$act_lnk="data/act_user.php";
	break;
}

if($sql!=""){
	$conn=connect();
	$rs=exec_qry($conn,$sql);
	if(db_error($conn)!=""){echo $sql;}
	$rows=fetch_all($rs);
	disconnect($conn);
	$caps=explode(",",$cap);
}else{
	$rows=array();
	$caps=array();
}
?>

	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$("#example1").DataTable();
    $('#example2').DataTable({
    dom: 'T<"clear"><""lf<t>ip>',
		paging: true,
		lengthChange: false,
		searching: false,
		ordering: true,
		info: true,
		autoWidth: false
    });
});

	</script>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
					<?php for($i=0;$i<count($caps);$i++){?>
						<th><?php echo $caps[$i];?></th>
					<?php } ?>
					</tr>
				</thead>
				<tbody>
	<?php for($i=0;$i<count($rows);$i++){
		$id=$rows[$i][0];
		?>
					<tr>
			<?php for($j=0;$j<count($caps);$j++){
				if($j==(count($caps)-1)){?>
					<td>
						<a href="<?php echo $edit_lnk;?>?a=e&t=<?php echo $t;?>&id=<?php echo $id;?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp; <!-- Edit Link -->
						<?php if($rows[$i][2] == 'Belum Aktif'){ ?>
							<a href="<?php echo $act_lnk;?>?t=<?php echo 'act';?>&id=<?php echo $id;?>"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></a> <!-- Activation Link -->
						<?php } else { ?>
							<a href="<?php echo $act_lnk;?>?t=<?php echo 'deact';?>&id=<?php echo $id;?>"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></a> <!-- Deactivation Link -->
						<?php } ?>
					</td>
					<?php
					} else {
					?>
					<td><?php echo $rows[$i][$j]; ?></td>
		<?php } } ?>
					</tr>
	<?php } ?>
				</tbody>
			</table>