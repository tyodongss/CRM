<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$id_barang=$_POST['id_barang']; 
$tanggal=$_POST['tanggal'];
$id_engineer=$_POST['id_engineer']; 
$remark=$_POST['remark'];   
$swos=$_POST['swos'];   

$query=mysql_query("update dismantle set id_barang='$id_barang', tanggal='$tanggal', id_engineer='$id_engineer', remark='$remark', swos='$swos' where id_dismantle='$id'"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-dismantle.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
