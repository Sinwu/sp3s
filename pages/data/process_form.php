<?php
include 'api/db.php';
 
$selectvalue = $_GET['svalue'];

$result = mysql_query("SELECT id,nama_proses FROM tbl_proses WHERE proyek_id = ".$selectvalue);
 
echo '<option value="" selected="selected">Pilih Tahapan..</option>';
while($row = mysql_fetch_array($result))
  {
    echo '<option value="'.$row['id'].'">' . $row['nama_proses'] . "</option>";
    //echo $row['drink_type'] ."<br/>";
  }
 
mysql_free_result($result);
 
?>