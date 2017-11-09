<?php
# Logging
include "proses-log.php";

include "koneksi.php";
$judul_ca_budget=$_POST['judul_ca_budget'];
$id_bulan=$_POST['id_bulan'];
$id_tahun=$_POST['id_tahun'];
$jumlah_awal=$_POST['jumlah_awal'];
$jumlah_sisa=$_POST['jumlah_sisa'];
$status_ca_budget=$_POST['status_ca_budget'];


$a=mysql_query("insert into ca_budget(judul_ca_budget,id_bulan,id_tahun,jumlah_awal,jumlah_sisa,status_ca_budget) value ('$judul_ca_budget','$id_bulan','$id_tahun','$jumlah_awal','$jumlah_sisa','$status_ca_budget')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-ca-budget.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
