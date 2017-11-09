<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$name_engineer=$_POST['name_engineer']; 
$email_engineer=$_POST['email_engineer']; 
$no_telp=$_POST['no_telp']; 
$posisi=$_POST['posisi'];
$status=$_POST['status']; 
$remark=$_POST['remark'];  
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

$query ="update engineer set name_engineer='$name_engineer', email_engineer='$email_engineer', no_telp='$no_telp', posisi='$posisi',  status='$status', remark='$remark', username='$username', password='$password', role='$role' where id_engineer='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-engineer.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}
?>
