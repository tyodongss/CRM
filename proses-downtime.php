<?php
#Logging
include "proses-log.php";

include "koneksi.php";

$id_customer=$_POST['id_customer'];
$datetime_start=$_POST['datetime_start'];
$datetime_end=$_POST['datetime_end'];
$keterangan=$_POST['keterangan'];
$swos=$_POST['swos'];
$id_engineer=$_POST['id_engineer'];
$status_downtime=$_POST['status_downtime'];

$a=mysql_query("insert into downtime (id_customer, datetime_start, datetime_end, keterangan, swos, id_engineer, status_downtime) value ('$id_customer', '$datetime_start', '$datetime_end', '$keterangan', '$swos', '$id_engineer', '$status_downtime')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-downtime.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?>
