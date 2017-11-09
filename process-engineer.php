<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$name_engineer=$_POST['name_engineer'];
$email_engineer=$_POST['email_engineer'];
$no_telp=$_POST['no_telp'];
$posisi=$_POST['posisi'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

$a=mysql_query("insert into engineer(name_engineer, email_engineer, no_telp,posisi, status, remark, username, password, role) value ('$name_engineer', '$email_engineer', '$no_telp', '$posisi', '$status', '$remark', '$username', '$password', '$role')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-engineer.php\">";
}else{
  echo "Failed to input data" or mysql_error(); 
}
?>
