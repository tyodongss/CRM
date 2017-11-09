<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("delete from dismantle where id_dismantle='$id'"); 

if($query){ 
  ?><script language="javascript">document.location.href="show-dismantle.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 

?>
