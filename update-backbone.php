<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$nama_backbone=$_POST['nama_backbone']; 
$alamat=$_POST['alamat']; 
$account_manager=$_POST['account_manager'];
$account_manager_telephone=$_POST['account_manager_telephone']; 
$account_manager_email=$_POST['account_manager_email']; 
$support_telephone=$_POST['support_telephone']; 
$support_email=$_POST['support_email']; 
$website=$_POST['website']; 
$remark=$_POST['remark'];  

$query ="update backbone set nama_backbone='$nama_backbone', alamat='$alamat', account_manager='$account_manager', account_manager_telephone='$account_manager_telephone', account_manager_email='$account_manager_email', support_telephone='$support_telephone', support_email='$support_email', website='$website', remark='$remark', updated_at=NOW() where id_backbone='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-backbone.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
