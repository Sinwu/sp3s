<?php
include 'inc.db.php';

$t="";
$sql="";
$cap="";
if(isset($_GET['t'])){$t=$_GET['t'];}
$new=true;
$edit_lnk="data2.php";

switch($t){
	case "photo": 
		$sql = "SELECT t.id, dtl.milestone, t.task_name, t.tgl_upload, if(t.approved=1,'Disetujui','Belum Disetujui'), t.photo_name, t.photo_filepath FROM tbl_task t 
		left join tbl_tahapan_detail dtl on t.tahapan_detail_id=dtl.id
		order by t.approved desc";
		$cap="Id, Milestone, Aktifitas, Tgl Unggah, Status, Verifikasi";$edit_lnk="dataprj.php";$detail_lnk="m_prs.php";$new_t="prs";
		$act_lnk="data/app_photo.php";
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
						<a class="content" href="<?php echo "data/"; echo $rows[$i][6]; echo $rows[$i][5]; ?>"><i class="fa fa-file-image-o fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp; <!-- Edit Link -->
						<?php if($rows[$i][4] == 'Belum Disetujui'){ ?>
							<a href="<?php echo $act_lnk;?>?t=<?php echo 'act';?>&id=<?php echo $id;?>"><i class="fa fa-thumbs-o-down fa-2x" aria-hidden="true"></i></a> <!-- Activation Link -->
						<?php } else { ?>
							<a href="<?php echo $act_lnk;?>?t=<?php echo 'deact';?>&id=<?php echo $id;?>"><i class="fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i></a> <!-- Deactivation Link -->
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