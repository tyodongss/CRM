<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
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

$query=mysql_query("update items set serial_number='$serial_number', id_type='$id_type', id_model='$id_model', from_purchase='$from_purchase', date_purchase='$date_purchase', contract_condition='$contract_condition', id_customer='$id_customer', ip_address='$ip_address', status='$status', remark='$remark' where id_items='$id'"); 

if($query){ 
  echo "<font color='white'>Save Successful</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-item.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
} 
?> 
