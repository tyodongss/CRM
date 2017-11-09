<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$swos=$_POST['swos']; 
$id_customer=$_POST['id_customer']; 
$status_charge=$_POST['status_charge'];
$nama_cust_complain=$_POST['nama_cust_complain']; 
$complain_via=$_POST['complain_via'];
$priority_complain=$_POST['priority_complain'];
$datetime_start=$_POST['datetime_start'];  
$datetime_end=$_POST['datetime_end'];  
$root_cause=$_POST['root_cause'];  
$solved_after=$_POST['solved_after'];  
$status_cust_complain=$_POST['status_cust_complain'];  

$query ="update customer_complain set swos='$swos', id_customer='$id_customer', status_charge='$status_charge', nama_cust_complain='$nama_cust_complain', complain_via='$complain_via', priority_complain='$priority_complain', datetime_start='$datetime_start', datetime_end='$datetime_end', root_cause='$root_cause', solved_after='$solved_after', status_cust_complain='$status_cust_complain' where id_customer_complain='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-customer-complain.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
