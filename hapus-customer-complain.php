<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("delete from customer_complain where id_customer_complain='$id'"); 
if($query){ 
  ?><script language="javascript">document.location.href="show-customer-complain.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
