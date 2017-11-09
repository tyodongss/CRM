<?php 
# Logging
include "proses-log.php";


include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("delete from barang_keluar where id_barangKeluar='$id'"); 
if($query){ 
  ?><script language="javascript">document.location.href="show-barang-keluar.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
