<?php
# Logging
include "proses-log.php";

include "koneksi.php";
$id_barang=$_POST['id_barang'];
$id_customer=$_POST['id_customer'];
$bts=$_POST['bts'];
$tanggal=$_POST['tanggal'];
$id_engineer=$_POST['id_engineer'];
$swos=$_POST['swos'];

$query=mysql_query("insert into barang_keluar(id_barang, id_customer, bts, tanggal, id_engineer, swos) value('$id_barang','$id_customer','$bts','$tanggal','$id_engineer','$swos')"); 

if($query){ 
echo "<meta http-equiv=\"refresh\" content=\"1;show-barang-keluar.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
$query2=mysql_query("update barang set status_barang='tidak tersedia' where id_barang='$id_barang'");
?>
