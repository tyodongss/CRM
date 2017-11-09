<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("delete from bts_ups where id='$id'");
if($query){ 
  ?><script language="javascript">document.location.href="show-data-ups.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
