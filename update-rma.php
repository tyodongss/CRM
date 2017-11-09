<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$id_barang=$_POST['id_barang']; 
$id_vendor=$_POST['id_vendor']; 
$status_rma=$_POST['status_rma'];
$tgl_kirim=$_POST['tgl_kirim'];   
$tgl_selesai=$_POST['tgl_selesai'];   

$query=mysql_query("update rma set id_barang='$id_barang', id_vendor='$id_vendor', status_rma='$status_rma', tgl_kirim='$tgl_kirim', tgl_selesai='$tgl_selesai' where id_rma='$id'"); 

if($status_rma=="selesai RMA"){ 
  $query2 = mysql_query("update barang set status_barang='tersedia', kondisi='bekas RMA' where id_barang='$id_barang'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-rma.php\">";
}else if($status_rma=="dikirim RMA") {
  echo "<meta http-equiv=\"refresh\" content=\"1;show-rma.php\">";
} 
?> 
