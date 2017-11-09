<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$id_engineer=$_POST['id_engineer'];
$id_support_parts=$_POST['id_support_parts'];
$id_customer=$_POST['id_customer'];
$name_complain=$_POST['name_complain'];
$name_pic=$_POST['name_pic'];
$start_time=$_POST['start_time'];
$problem=$_POST['problem'];
$action=$_POST['action'];
$end_time=$_POST['end_time'];
$remark=$_POST['remark'];

$a=mysql_query("insert into daily_activity(id_engineer, id_support_parts, id_customer, name_complain, name_pic, start_time, problem, action, end_time, remark) value ('$id_engineer', '$id_support_parts', '$id_customer', '$name_complain', '$name_pic', '$start_time', '$problem', '$action', '$end_time', '$remark')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-daily-activity.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}

?>
