<?php
# Logging
include "proses-log.php";

include "koneksi.php";
$nama_backbone=$_POST['nama_backbone'];
$alamat=$_POST['alamat'];
$account_manager=$_POST['account_manager'];
$account_manager_telephone=$_POST['account_manager_telephone'];
$account_manager_email=$_POST['account_manager_email'];
$support_telephone=$_POST['support_telephone'];
$support_email=$_POST['support_email'];
$website=$_POST['website'];
$remark=$_POST['remark'];

$a=mysql_query("insert into backbone(nama_backbone,alamat,account_manager,account_manager_telephone,account_manager_email,support_telephone,support_email,website,remark) value ('$nama_backbone','$alamat','$account_manager', '$account_manager_telephone', '$account_manager_email', '$support_telephone', '$support_email', '$website', '$remark')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-backbone.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
