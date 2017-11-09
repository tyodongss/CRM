<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$id_items=$_POST['id_items'];
$date_update=$_POST['date_update'];
$purpose=$_POST['purpose'];
$purpose_name_item=$_POST['purpose_name_item'];
$id_customer=$_POST['id_customer'];
$id_engineer=$_POST['id_engineer'];

$a=mysql_query("insert into items_update(id_items, date_update, purpose, purpose_name_item, id_customer, id_engineer) value('$id_items', '$date_update', '$purpose', '$purpose_name_item', '$id_customer', '$id_engineer')"); 

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-item-update.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
} 

?>

