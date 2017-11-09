<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$nama_engineer=$_POST['nama_engineer'];
$no_telp=$_POST['no_telp'];
$posisi=$_POST['posisi'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

$a=mysql_query("insert into engineer(nama_engineer,no_telp,posisi,status,remark, username, password, role) value ('$nama_engineer','$no_telp','$posisi', '$status', '$remark', '$username', '$password', '$role')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"2;show-engineer.php\">";
}else{
  echo "Gagal input data" or mysql_error(); 
}
?>
