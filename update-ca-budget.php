<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$judul_ca_budget=$_POST['judul_ca_budget']; 
$id_bulan=$_POST['id_bulan']; 
$id_tahun=$_POST['id_tahun'];
$jumlah_awal=$_POST['jumlah_awal']; 
$jumlah_sisa=$_POST['jumlah_sisa']; 
$status_ca_budget=$_POST['status_ca_budget']; 

$query ="update ca_budget set judul_ca_budget='$judul_ca_budget', id_bulan='$id_bulan', id_tahun='$id_tahun', jumlah_awal='$jumlah_awal', jumlah_sisa='$jumlah_sisa', status_ca_budget='$status_ca_budget', updated_at=NOW() where id_ca_budget='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-ca-budget.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
