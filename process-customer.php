<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$name_customer=$_POST['name_customer'];
$address=$_POST['address'];
$contact_person=$_POST['contact_person'];
$telephone=$_POST['telephone'];
$remark=$_POST['remark'];

$cek_name_customer_cust=mysql_num_rows(mysql_query("SELECT name_customer FROM customer 
	WHERE name_customer='$_POST[name_customer]'"));

if ($cek_name_customer_cust > 0){
  echo "Customer Name has been already exist. Please try another name.";
}

else{

$a=mysql_query("insert into customer(name_customer, address, contact_person, telephone, remark) value('$name_customer','$address', '$contact_person', '$telephone', '$remark')"); 

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-customer.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
} }

?>
