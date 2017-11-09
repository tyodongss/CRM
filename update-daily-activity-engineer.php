<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$id_engineer=$_POST['id_engineer']; 
$id_support_parts=$_POST['id_support_parts'];
$activity=$_POST['activity'];
$id_customer=$_POST['id_customer'];
$start_time=$_POST['start_time'];  
$end_time=$_POST['end_time'];
$remark=$_POST['remark'];

$query ="update daily_activity set id_engineer='$id_engineer', id_support_parts='$id_support_parts', activity='$activity', id_customer='$id_customer', start_time='$start_time', end_time='$end_time', remark='$remark', updated_at=NOW() where id_daily_activity='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-daily-activity-engineer.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}
?>
