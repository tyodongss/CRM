<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("delete from tools where id_tools='$id'"); 
if($query){ 
  ?><script language="javascript">document.location.href="show-tools.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
