<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("delete from downtime where id_downtime='$id'"); 
if($query){ 
  ?><script language="javascript">document.location.href="show-downtime.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
