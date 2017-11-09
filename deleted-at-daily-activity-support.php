<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("update daily_activity set deleted_at=NOW()  where id_daily_activity='$id'");
if($query){ 
  ?><script language="javascript">document.location.href="show-daily-activity-support.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
