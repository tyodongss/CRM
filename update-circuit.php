<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$nama_circuit=$_POST['nama_circuit']; 
$id_backbone=$_POST['id_backbone']; 
$id_customer=$_POST['id_customer'];
$tanggal_aktivasi=$_POST['tanggal_aktivasi'];
$tanggal_terminasi=$_POST['tanggal_terminasi'];
$monthly_fee_idr=$_POST['monthly_fee_idr'];
$monthly_fee_usd=$_POST['monthly_fee_usd'];
$status_circuit=$_POST['status_circuit'];
$remark=$_POST['remark'];    

$query ="update circuit set nama_circuit='$nama_circuit', id_backbone='$id_backbone', id_customer='$id_customer', tanggal_aktivasi='$tanggal_aktivasi', tanggal_terminasi='$tanggal_terminasi', monthly_fee_idr='$monthly_fee_idr', monthly_fee_usd='$monthly_fee_usd', status_circuit='$status_circuit', remark='$remark', updated_at=NOW() where id_circuit='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-circuit.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
