<?php 
# Logging
include "proses-log.php";



include "koneksi.php"; 
$id = $_GET['id'];
$query=mysql_query("delete from vendor where id_vendor='$id'"); 
if($query){ echo mysql_error(); 
  ?><script language="javascript">document.location.href="show-vendor.php";</script><?php 
}else{ 
  echo "gagal hapus data";

echo mysql_error(); 
} 
?>
