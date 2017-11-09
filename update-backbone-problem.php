<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$swos=$_POST['swos']; 
$id_circuit=$_POST['id_circuit']; 
$id_backbone=$_POST['id_backbone'];
$description=$_POST['description'];
$datetime_start=$_POST['datetime_start'];  
$datetime_end=$_POST['datetime_end'];  
$root_cause=$_POST['root_cause'];  
$solved_after=$_POST['solved_after'];  
$status_backbone_problem=$_POST['status_backbone_problem'];  

$query ="update backbone_problem set swos='$swos', id_circuit='$id_circuit', id_backbone='$id_backbone', description='$description', datetime_start='$datetime_start', datetime_end='$datetime_end', root_cause='$root_cause', solved_after='$solved_after', status_backbone_problem='$status_backbone_problem', updated_at=NOW() where id_backbone_problem='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-backbone-problem.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
