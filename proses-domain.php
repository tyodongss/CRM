<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$nama_domain=$_POST['nama_domain'];
$id_customer=$_POST['id_customer'];
$id_registrar=$_POST['id_registrar'];
$date_register=$_POST['date_register'];
$date_expire=$_POST['date_expire'];
$domainhosting=$_POST['domainhosting'];
$webhosting=$_POST['webhosting'];
$webhosting_usage=$_POST['webhosting_usage'];
$mailhosting=$_POST['mailhosting'];
$mailhosting_usage=$_POST['mailhosting_usage'];
$status_domain=$_POST['status_domain'];
$nama_kontak=$_POST['nama_kontak'];
$hp_kontak=$_POST['hp_kontak'];
$email_kontak=$_POST['email_kontak'];
$remark=$_POST['remark'];

$a=mysql_query("insert into domain(nama_domain,id_customer,id_registrar,date_register,date_expire,domainhosting,webhosting,webhosting_usage,mailhosting,mailhosting_usage,status_domain,nama_kontak,hp_kontak,email_kontak,remark) value ('$nama_domain','$id_customer','$id_registrar', '$date_register', '$date_expire', '$domainhosting', '$webhosting', '$webhosting_usage', '$mailhosting', '$mailhosting_usage', '$status_domain', '$nama_kontak', '$hp_kontak', '$email_kontak', '$remark')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-domain.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
