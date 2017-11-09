<?php
#Logging
include "proses-log.php";

include "koneksi.php";

$id_customer=$_POST['id_customer'];
$id_engineer=$_POST['id_engineer'];
$nama_user=$_POST['nama_user'];
$complain_via=$_POST['complain_via'];
$tipe_pekerjaan=$_POST['tipe_pekerjaan'];
$datetime_start=$_POST['datetime_start'];
$datetime_end=$_POST['datetime_end'];
$priority_pekerjaan=$_POST['priority_pekerjaan'];
$scope_pekerjaan=$_POST['scope_pekerjaan'];
$id_detail_pekerjaan=$_POST['id_detail_pekerjaan'];
$keterangan_pekerjaan=$_POST['keterangan_pekerjaan'];

$a=mysql_query("insert into it_outsource (id_customer, id_engineer, nama_user, complain_via, tipe_pekerjaan, datetime_start, datetime_end, priority_pekerjaan, scope_pekerjaan, id_detail_pekerjaan, keterangan_pekerjaan) 
value       
('$id_customer', '$id_engineer', '$nama_user', '$complain_via', '$tipe_pekerjaan','$datetime_start', '$datetime_end', '$priority_pekerjaan', '$scope_pekerjaan', '$id_detail_pekerjaan', '$keterangan_pekerjaan')");

if ($a){
echo "<meta http-equiv=\"refresh\" content=\"1;show-it-outsource-support.php\">";
}
else {
echo "Gagal Simpan";
echo mysql_error(); 
}
?>
