<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$nama_vendor=$_POST['nama_vendor'];
$alamat=$_POST['alamat'];
$no_telp=$_POST['no_telp'];
$contact_person=$_POST['contact_person'];
$remark=$_POST['remark'];

$a=mysql_query("insert into vendor(nama_vendor,alamat,no_telp,contact_person,remark) value ('$nama_vendor','$alamat','$no_telp', '$contact_person', '$remark')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-vendor.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
