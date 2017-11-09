<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$nama            =$_POST['nama'];
$alamat          =$_POST['alamat'];
$no_telp         =$_POST['no_telp'];
$contact_person_1=$_POST['contact_person_1'];
$hp_1            =$_POST['hp_1'];
$email_1         =$_POST['email_1'];
$contact_person_2=$_POST['contact_person_2'];
$hp_2            =$_POST['hp_2'];
$email_2         =$_POST['email_2'];
$id_service      =$_POST['id_service'];
$id_bandwidth_down=$_POST['id_bandwidth_down'];
$id_bandwidth_up =$_POST['id_bandwidth_up'];
$tanggal_aktivasi =$_POST['tanggal_aktivasi'];
$tanggal_terminasi =$_POST['tanggal_terminasi'];
$monthly_fee_idr =$_POST['monthly_fee_idr'];
$monthly_fee_usd =$_POST['monthly_fee_usd'];
$status          =$_POST['status'];
$remark          =$_POST['remark'];

$cek_nama_cust=mysql_num_rows(mysql_query("SELECT nama FROM customer 
	WHERE nama='$_POST[nama]'"));

if ($cek_nama_cust > 0){
  echo "Nama Customer telah ada. Harap Ulangi";
}

else{

$a=mysql_query("insert into customer(nama, alamat, no_telp, contact_person_1, hp_1, email_1, contact_person_2, hp_2, email_2, id_service, id_bandwidth_down, id_bandwidth_up, tanggal_aktivasi, tanggal_terminasi, monthly_fee_idr, monthly_fee_usd, status, remark) value('$nama','$alamat', '$no_telp', '$contact_person_1', '$hp_1', '$email_1', '$contact_person_2', '$hp_2', '$email_2', '$id_service', '$id_bandwidth_down', '$id_bandwidth_up', '$tanggal_aktivasi', '$tanggal_terminasi', '$monthly_fee_idr', '$monthly_fee_usd', '$status', '$remark')"); 

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-customer.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} }

?>
