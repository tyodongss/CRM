<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$id_barang=$_POST['id_barang'];
$tanggal=$_POST['tanggal'];
$id_engineer=$_POST['id_engineer'];
$remark=$_POST['remark'];
$swos=$_POST['swos'];

$query=mysql_query("insert into dismantle(id_barang, tanggal, id_engineer, remark, swos) value('$id_barang','$tanggal','$id_engineer','$remark','$swos')"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-dismantle.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
$query2 = mysql_query("update barang set status_barang='tersedia', kondisi='bekas Dismantle' where id_barang='$id_barang'");
?>
