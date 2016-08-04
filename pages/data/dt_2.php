<?php
include 'inc.db.php';

$t="";
$sql="";
$cap="";
if(isset($_GET['t'])){$t=$_GET['t'];}
$new=true;
$edit_lnk="data2.php";

switch($t){

	case "prs": 
		$newid = $_GET['id'];
		$sql="SELECT prs.id, prs.tahapan, prs.nama_proses, prs.updated, prs.progress, if(prs.done=0,'Active','Finished') FROM tbl_proses prs
		LEFT JOIN tbl_proyek pry on prs.proyek_id=pry.id
		WHERE prs.proyek_id=$newid 
		ORDER BY prs.urutan";
		$cap="ID, Tahapan, Nama Proses, Diperbaharui, Progress, Status, Action";$edit_lnk="addproses.php";$detail_lnk="m_mls.php";$new_t="mls";
		// Nama proyek as subjudul
		$judul="";
		$conn=connect();
		$sql2="SELECT nama_proyek FROM tbl_proyek WHERE id=$newid";
		$rs2=exec_qry($conn,$sql2);
		while($row = fetch_assoc($rs2)){
		    $subjudul="[ " . $row['nama_proyek'] ." ]";
		}
		$proyek="";
		disconnect($conn);
		// add new button value
		$addbutton="Proses";
	break;
	case "mls": 
		$newid = $_GET['id'];
		$sql="SELECT dtl.id, dtl.milestone, dtl.updated, dtl.progress, if(dtl.done=0,'Active','Finished') FROM tbl_tahapan_detail dtl
		LEFT JOIN tbl_proses prs on dtl.proses_id=prs.id
		WHERE dtl.proses_id=$newid 
		ORDER BY dtl.id";
		$cap="ID, Kegiatan, Diperbaharui, Progress, Status, Action";$edit_lnk="addmilestone.php";$detail_lnk="m_task2.php";$new_t="typ2";
		// Nama proses as subjudul
		$judul="";
		$conn=connect();
		$sql2="SELECT proyek_id,tahapan,nama_proses FROM tbl_proses WHERE id=$newid";
		$rs2=exec_qry($conn,$sql2);
		while($row = fetch_assoc($rs2)){
			$judul="[ " . $row['tahapan'];
		    $subjudul=" - " . $row['nama_proses'] . " ]";
		    $pry_id=$row['proyek_id'];
		}
		//
		$sql3="SELECT nama_proyek FROM tbl_proyek WHERE id=$pry_id";
		$rs3=exec_qry($conn,$sql3);
		while($row = fetch_assoc($rs3)){
		    $proyek=$row['nama_proyek']." - ";
		}
		disconnect($conn);
		// add new button value
		$addbutton="Milestone";
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
	
	<h4 class="page-title"><?php echo $proyek; ?>  <?php echo $judul; ?>  <?php echo $subjudul; ?></br></h4>
	<?php if($new){?>
	</br><a class="btn" href="<?php echo $edit_lnk;?>?a=n&id=<?php echo $newid;?>&t=<?php echo $t;?>"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo $addbutton;?></a><br /><br />
	<?php } ?>
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
				if($j==(count($caps)-1)){
					if ($t!='mls') { ?>
					<td>
						<a class="content" href="<?php echo $edit_lnk;?>?a=e&t=<?php echo $t;?>&id=<?php echo $id;?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>&nbsp;
						<a class="content" href="<?php echo $detail_lnk;?>?a=e&t=<?php echo $new_t;?>&id=<?php echo $id;?>"><i class="fa fa-list-ol fa-2x" aria-hidden="true"></i></a>
					</td>
				<?php
					} else { ?>
						<td>
							<a class="content" href="<?php echo $edit_lnk;?>?a=e&t=<?php echo $t;?>&id=<?php echo $id;?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>&nbsp;

						</td>
				<?php	}
					} else {
					?>
							<td><?php echo $rows[$i][$j]; ?></td>
					<?php } } ?>
						</tr>
		<?php } ?>
				</tbody>
			</table>