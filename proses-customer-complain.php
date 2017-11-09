<?php
#Logging
include "proses-log.php";

include "koneksi.php";

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


$a=mysql_query("insert into customer_complain 
(swos, id_customer, status_charge, nama_cust_complain, complain_via, priority_complain, datetime_start, datetime_end, root_cause, solved_after,  status_cust_complain) 
value     
('$swos', '$id_customer', '$status_charge', '$nama_cust_complain', '$complain_via', '$priority_complain', '$datetime_start', '$datetime_end', '$root_cause', '$solved_after',  '$status_cust_complain')");

if ($a){
echo "<meta http-equiv=\"refresh\" content=\"1;show-customer-complain.php\">";
}
else {
echo "Gagal Simpan";
echo mysql_error(); 
}
?>
