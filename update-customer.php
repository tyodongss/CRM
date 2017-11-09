<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id'];
$name_customer=$_POST['name_customer']; 
$address=$_POST['address'];
$contact_person=$_POST['contact_person']; 
$telephone=$_POST['telephone']; 
$remark=$_POST['remark'];


$query=mysql_query("update customer set name_customer='$name_customer', address='$address', contact_person='$contact_person', telephone='$telephone', remark='$remark', updated_at=NOW()  where id_customer='$id'"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-customer.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
} 

?> 
