<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("update it_outsource set deleted_at=NOW()  where id_it_outsource='$id'");
if($query){ 
  ?><script language="javascript">document.location.href="show-it-outsource-support.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
