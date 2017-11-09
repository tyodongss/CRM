<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("delete from ca_request where id_ca_request='$id'");
if($query){ 
  ?><script language="javascript">document.location.href="show-ca-request.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
