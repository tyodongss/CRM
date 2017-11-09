<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$swos=$_POST['swos'];
$id_engineer=$_POST['id_engineer'];
$tipe_pekerjaan=$_POST['tipe_pekerjaan'];
$activity=$_POST['activity'];
$id_customer=$_POST['id_customer'];
$datetime_start=$_POST['datetime_start'];
$datetime_finish=$_POST['datetime_finish'];
$ot=$_POST['ot'];
$rb=$_POST['rb'];
$trip_allowance=$_POST['trip_allowance'];
$remark=$_POST['remark'];

$a=mysql_query("insert into daily_activity(swos,id_engineer,tipe_pekerjaan,activity,id_customer,datetime_start,datetime_finish,ot,rb,trip_allowance,remark) value ('$swos','$id_engineer','$tipe_pekerjaan', '$activity', '$id_customer', '$datetime_start', '$datetime_finish', '$ot', '$rb', '$trip_allowance', '$remark')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-daily-activity.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
