<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 

$id= $_GET['id'];
$query=mysql_query("update backbone_problem set deleted_at=NOW()  where id_backbone_problem='$id'");
if($query){ 
  ?><script language="javascript">document.location.href="show-backbone-problem.php";</script><?php 
}else{ 
  echo "gagal hapus data"; 
} 
?>
