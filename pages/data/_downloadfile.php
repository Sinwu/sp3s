<?php
#include "inc.chksession.php";
include "api/db.php";
// download page
$query = mysql_query("SELECT id, tahapan_detail_id, task_name, photo_name, photo_filepath, description FROM tbl_task");      
while($result = mysql_fetch_array($query))
{
    print_r($result);
    echo $result['photo_filepath'];
    echo $result['photo_name'];
    echo "<a href='".$result['photo_filepath'].$result['photo_name']."'>".$result['task_name']."</a>";
}

?>