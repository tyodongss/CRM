<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$name_vendor=$_POST['name_vendor']; 
$address=$_POST['address']; 
$telephone=$_POST['telephone'];
$contact_person=$_POST['contact_person']; 
$handphone=$_POST['handphone'];  
$email=$_POST['email'];  
$remark=$_POST['remark'];  

$query ="update vendor set name_vendor='$name_vendor', address='$address', telephone='$telephone', contact_person='$contact_person', handphone='$handphone', email='$email', remark='$remark' where id_vendor='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-vendor.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}
?>
