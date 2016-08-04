<?php
include "api/db.php";
$user_assign= $_SESSION['login_id'];

// count number of project
$listProyekId=mysql_query("SELECT id FROM tbl_proyek WHERE user_assign=".$user_assign);
$listProyekId_arr = array();
while(($row = mysql_fetch_assoc($listProyekId))) {
	$listProyekId_arr[] = $row['id'];
}
$jumlahProyek = mysql_num_rows($listProyekId);
#mysql_data_seek($listProyekId, 0);

// count overdue project
$getDateDiff=mysql_query("SELECT datediff(curdate(),END) as diff FROM tbl_proyek WHERE done=0 AND user_assign=".$user_assign);
$dateDiff_arr = array();
while (($row2 = mysql_fetch_assoc($getDateDiff))) {
	$dateDiff_arr[] = $row2['diff'];
}
$countDiff = mysql_num_rows($getDateDiff);
#mysql_data_seek($getDateDiff, 0);

// count done project
$getDoneProject = mysql_query("SELECT id FROM tbl_proyek WHERE done=1 AND user_assign=".$user_assign);
$doneProject_arr = array();
while (($row3 = mysql_fetch_array($getDoneProject))) {
	$doneProject_arr = $row3['id'];
}
$countProjectDone = mysql_num_rows($getDoneProject);
#mysql_data_seek($getDoneProject, 0);

// count progress ratio of all project
$getTotalProgress = mysql_query("SELECT sum(progress) as totalProgress FROM tbl_proyek WHERE done=0 AND user_assign=".$user_assign);
$getDueProject = mysql_query("SELECT id FROM tbl_proyek WHERE done=0 AND user_assign=".$user_assign);
while (($row4 = mysql_fetch_assoc($getTotalProgress))) {
	$totalProgress = $row4['totalProgress'];
}
$countDueProject = mysql_num_rows($getDueProject);
if ($countDueProject!=0) {
	$ratioProgress = $totalProgress/$countDueProject;
} else {
	$ratioProgress = 0;
}
?>