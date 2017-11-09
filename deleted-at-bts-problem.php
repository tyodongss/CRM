<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("update bts_problem set deleted_at=NOW()  where id_bts_problem='$id'");
if($query){ 
  ?><script language="javascript">document.location.href="show-bts-problem.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
