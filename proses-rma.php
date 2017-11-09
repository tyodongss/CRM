<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$id_barang=$_POST['id_barang'];
$id_vendor=$_POST['id_vendor'];
$status_rma=$_POST['status_rma'];
$tgl_kirim=$_POST['tgl_kirim'];
$tgl_selesai=$_POST['tgl_selesai'];


$query=mysql_query("insert into rma(id_barang, id_vendor, status_rma, tgl_kirim, tgl_selesai) value('$id_barang','$id_vendor', '$status_rma', '$tgl_kirim', '$tgl_selesai')"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-rma.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

$query2=mysql_query("update barang set status_barang='RMA' where id_barang='$id_barang'");
?>
