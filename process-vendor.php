<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$name_vendor=$_POST['name_vendor'];
$address=$_POST['address'];
$telephone=$_POST['telephone'];
$contact_person=$_POST['contact_person'];
$handphone=$_POST['handphone'];
$email=$_POST['email'];
$remark=$_POST['remark'];

$a=mysql_query("insert into vendor(name_vendor, address, telephone, contact_person, handphone, email, remark) value ('$name_vendor','$address','$telephone', '$contact_person', '$handphone', '$email', '$remark')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-vendor.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}

?>
