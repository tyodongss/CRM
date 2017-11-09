<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$id_items=$_POST['id_items'];
$date_update=$_POST['date_update'];
$purpose=$_POST['purpose'];
$purpose_name_item=$_POST['purpose_name_item'];
$id_customer=$_POST['id_customer'];
$id_engineer=$_POST['id_engineer'];

$query=mysql_query("update items_update set id_items='$id_items', date_update='$date_update', purpose='$purpose', purpose_name_item='$purpose_name_item', id_customer='$id_customer', id_engineer='$id_engineer' where id_items='$id'"); 

if($query){ 
  echo "<font color='white'>Save Successful</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-item-update.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
} 
?> 
