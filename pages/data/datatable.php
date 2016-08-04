<?php
include 'inc.db.php';

$t="";
$sql="";
$cap="";
if(isset($_GET['t'])){$t=$_GET['t'];}
$new=true;
$edit_lnk="data2.php";

switch($t){
	case "prj": 
		$sql = "SELECT p.id, p.nama_proyek, s.nama_sekolah, u.nama, p.start, p.end from tbl_proyek p 
		inner join tbl_user u on p.user_assign=u.id
		left join tbl_sekolah s on p.sekolah_id=s.id
		order by p.id";
		$cap="Id,Proyek, Lokasi, Pelaksana, Mulai, Selesai, Action";$edit_lnk="dataprj.php";$detail_lnk="m_prs.php";$new_t="prs";
		$addbutton="Proyek"; $uplink="uploadprj.php";
	break;
	case "loc":
		$sql = "SELECT s.id, s.npsn, s.nama_sekolah, s.alamat from tbl_sekolah s";
		#left join tbl_user u on s.user_assign=u.id";
		$cap="Id,NPSN, Lokasi, Alamat, Action";$edit_lnk="dataprj.php";$detail_lnk="m_loc.php";$new_t="loc";
		$addbutton="Lokasi"; $uplink="uploadloc.php";
		break;
	case "com": 
		$sql = "SELECT com.id, com.cat, com.comp_name, com.unit, com.price from components com";
		$cap="Id, Kategori, Nama Barang, Satuan Barang, Harga Barang, Action";$edit_lnk="dataprj.php";$detail_lnk="m_prs.php";$new_t="prs";
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
						<a class="content" href="<?php echo $edit_lnk;?>?a=e&t=<?php echo $t;?>&id=<?php echo $id;?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>&nbsp;
						<a class="content" href="<?php echo $detail_lnk;?>?a=e&t=<?php echo $new_t;?>&id=<?php echo $id;?>"><i class="fa fa-list-ol fa-2x" aria-hidden="true"></i></a>
					</td>
					<?php
				}else{
				?>
						<td><?php echo $rows[$i][$j]; ?></td>
				<?php } } ?>
					</tr>
	<?php } ?>
				</tbody>
			</table>