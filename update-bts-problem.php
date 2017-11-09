<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$swos=$_POST['swos']; 
$id_device_bts=$_POST['id_device_bts']; 
$id_bts=$_POST['id_bts'];
$id_engineer=$_POST['id_engineer']; 
$description=$_POST['description'];
$datetime_start=$_POST['datetime_start'];  
$datetime_end=$_POST['datetime_end'];  
$root_cause=$_POST['root_cause'];  
$solved_after=$_POST['solved_after'];  
$status_bts_problem=$_POST['status_bts_problem'];  

$query ="update bts_problem set swos='$swos', id_device_bts='$id_device_bts', id_bts='$id_bts', id_engineer='$id_engineer', description='$description', datetime_start='$datetime_start', datetime_end='$datetime_end', root_cause='$root_cause', solved_after='$solved_after', status_bts_problem='$status_bts_problem', updated_at=NOW() where id_bts_problem='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-bts-problem.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
