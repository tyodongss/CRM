<?php
# Logging
include "proses-log.php";

include "koneksi.php";
$id_job_to_do=$_POST['id_job_to_do'];
$id_engineer=$_POST['id_engineer'];
$tgl_update=$_POST['tgl_update'];
$keterangan=$_POST['keterangan'];

$a=mysql_query("insert into job_to_do2_update(id_job_to_do,id_engineer,tgl_update,keterangan) value ('$id_job_to_do','$id_engineer','$tgl_update', '$keterangan')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-job-to-do-update.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
