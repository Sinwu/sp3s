<?php
include 'api/db.php';
 
$selectvalue = $_GET['svalue'];

$result = mysql_query("SELECT id,milestone FROM tbl_tahapan_detail WHERE proses_id = ".$selectvalue);
 
echo '<option value="" selected="selected">Pilih Aktifitas..</option>';
while($row = mysql_fetch_array($result))
  {
    echo '<option value="'.$row['id'].'">' . $row['milestone'] . "</option>";
    //echo $row['drink_type'] ."<br/>";
  }
 
mysql_free_result($result);
 
?>