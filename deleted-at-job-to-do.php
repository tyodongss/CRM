<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("update job_to_do set deleted_at=NOW()  where id_job_to_do ='$id'");
if($query){ 
  ?><script language="javascript">document.location.href="show-job-to-do.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
