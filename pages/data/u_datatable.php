<?php
include 'inc.chksession.php';
include 'inc.db.php';

$t="";
$sql="";
$cap="";
if(isset($_GET['t'])){$t=$_GET['t'];}
$new=true;
$edit_lnk="data2.php";

switch($t){
	case "prj": 
		$u_id = $_SESSION['login_id'];
		$sql = "SELECT p.nomor_po, p.nama_proyek, p.start, p.end from tbl_proyek p 
		inner join tbl_user u on p.user_assign=u.id
		left join tbl_sekolah s on p.sekolah_id=s.id
		where p.user_assign = $u_id
		order by p.id";
		$cap="ID,Proyek, Mulai, Selesai";$detail_lnk="us_prs.php";$new_t="prs";

		$pryid = "";
		$conn=connect();
		$sql2="SELECT id FROM tbl_proyek WHERE id=$u_id";
		$rs2=exec_qry($conn,$sql2);
		while($row = fetch_assoc($rs2)){
		    $pryid="[ " . $row['id'] ." ]";
		}
		disconnect($conn);

		echo $pryid;
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
					if ($j==0) { ?>
						<td><a href="<?php echo $edit_lnk;?>?a=e&t=<?php echo $t;?>&id=<?php echo $id;?>"><?php echo $rows[$i][$j]; ?></a></td>
				<?php
					} else {
				?>
						<td><?php echo $rows[$i][$j]; ?></td>
				<?php } } ?>
					</tr>
	<?php } ?>
				</tbody>
			</table>