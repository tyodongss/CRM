<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("delete from barang where id_barang='$id'"); 
if($query){ 
  ?><script language="javascript">document.location.href="show-barang.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
