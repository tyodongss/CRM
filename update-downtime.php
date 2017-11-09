<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
 
$id=$_POST['id']; 
$id_customer=$_POST['id_customer'];
$datetime_start=$_POST['datetime_start']; 
$datetime_end=$_POST['datetime_end']; 
$keterangan=$_POST['keterangan'];
$swos=$_POST['swos'];
$id_engineer=$_POST['id_engineer']; 
$status_downtime=$_POST['status_downtime'];    

$query=mysql_query("update downtime set id_customer='$id_customer', datetime_start='$datetime_start', datetime_end='$datetime_end', keterangan='$keterangan', swos='$swos', id_engineer='$id_engineer', status_downtime='$status_downtime' where id_downtime='$id'"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-downtime.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
