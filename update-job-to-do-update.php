<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$id_job=$_POST['id_job']; 
$id_engineer=$_POST['id_engineer']; 
$date_update=$_POST['date_update'];
$support=$_POST['support']; 

$query ="update job_update set id_job='$id_job', id_engineer='$id_engineer', date_update='$date_update', support='$support', updated_at=NOW() where id_job_update='$id'"; 
$hasil = mysql_query($query);

if($hasil){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-job-to-do-update.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}
?>
