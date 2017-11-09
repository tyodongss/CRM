<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$serial_number=$_POST['serial_number'];
$id_type=$_POST['id_type'];
$id_model=$_POST['id_model'];
$from_purchase=$_POST['from_purchase'];
$date_purchase=$_POST['date_purchase'];
$contract_condition=$_POST['contract_condition'];
$id_customer=$_POST['id_customer'];
$ip_address=$_POST['ip_address'];
$status=$_POST['status'];
$remark=$_POST['remark'];

$check_sn=mysql_num_rows(mysql_query("SELECT serial_number FROM item 
  WHERE serial_number='$_POST[serial_number]'"));

if ($check_sn > 0){
  echo "Serial Number has already been exist. Please try again";
}

else{

$a=mysql_query("insert into items(serial_number, id_type, id_model, from_purchase, date_purchase, contract_condition, id_customer, ip_address, status, remark) value('$serial_number', '$id_type', '$id_model', '$from_purchase', '$date_purchase', '$contract_condition', '$id_customer', '$ip_address', '$status', '$remark')"); 

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-item.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
} }

?>

