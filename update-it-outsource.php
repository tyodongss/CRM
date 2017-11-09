<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
 
$id=$_POST['id']; 
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

$query=mysql_query("update it_outsource set id_customer='$id_customer', id_engineer='$id_engineer',  nama_user='$nama_user', complain_via='$complain_via', tipe_pekerjaan='$tipe_pekerjaan', datetime_start='$datetime_start', datetime_end='$datetime_end', priority_pekerjaan='$priority_pekerjaan', scope_pekerjaan='$scope_pekerjaan', id_detail_pekerjaan='$id_detail_pekerjaan',  keterangan_pekerjaan='$keterangan_pekerjaan', updated_at=NOW() where id_it_outsource='$id'"); 

if($query){ 
  echo "<font color='white'>Berhasil Simpan</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-it-outsource.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
