<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id'];
$nama=$_POST['nama']; 
$alamat=$_POST['alamat'];
$no_telp=$_POST['no_telp']; 
$contact_person_1=$_POST['contact_person_1']; 
$hp_1=$_POST['hp_1'];
$email_1=$_POST['email_1'];
$contact_person_2=$_POST['contact_person_2'];
$hp_2=$_POST['hp_2'];
$email_2=$_POST['email_2'];
$id_service=$_POST['id_service'];
$id_bandwidth_down=$_POST['id_bandwidth_down'];  
$id_bandwidth_up=$_POST['id_bandwidth_up'];
$tanggal_aktivasi=$_POST['tanggal_aktivasi'];
$tanggal_terminasi=$_POST['tanggal_terminasi'];
$monthly_fee_idr=$_POST['monthly_fee_idr'];
$monthly_fee_usd=$_POST['monthly_fee_usd'];
$status=$_POST['status'];
$remark=$_POST['remark'];  

$query=mysql_query("update customer set nama='$nama', alamat='$alamat', no_telp='$no_telp', contact_person_1='$contact_person_1', hp_1='$hp_1', email_1='$email_1', contact_person_2='$contact_person_2', hp_2='$hp_2', email_2='$email_2', id_service='$id_service', id_bandwidth_down='$id_bandwidth_down', id_bandwidth_up='$id_bandwidth_up', tanggal_aktivasi='$tanggal_aktivasi', tanggal_terminasi='$tanggal_terminasi', monthly_fee_idr='$monthly_fee_idr', monthly_fee_usd='$monthly_fee_usd', status='$status', remark='$remark', updated_at=NOW()  where id_customer='$id'"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-customer-sales.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 

?> 
