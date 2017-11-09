<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("delete from customer where id_customer='$id'"); 
if($query){ 
  ?><script language="javascript">document.location.href="show-customer.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
