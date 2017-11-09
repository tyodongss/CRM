<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$id_engineer=$_POST['id_engineer'];
$id_support_parts=$_POST['id_support_parts'];
$activity=$_POST['activity'];
$id_customer=$_POST['id_customer'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$remark=$_POST['remark'];

$a=mysql_query("insert into daily_activity(id_engineer, id_support_parts, activity, id_customer, start_time, end_time, remark) value ('$id_engineer', '$id_support_parts', '$activity', '$id_customer', '$start_time', '$end_time', '$remark')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-daily-activity-engineer.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}

?>
