<?php
# Logging
include "proses-log.php";

include "koneksi.php";
$id_consumable=$_POST['id_consumable'];
$id_customer=$_POST['id_customer'];
$bts=$_POST['bts'];
$tgl_keluar=$_POST['tgl_keluar'];
$jumlah_keluar=$_POST['jumlah_keluar'];
$id_engineer=$_POST['id_engineer'];
$swos=$_POST['swos'];

 
$query=mysql_query("insert into consumable_keluar(id_consumable, id_customer, bts, tgl_keluar, jumlah_keluar, id_engineer, swos) value('$id_consumable','$id_customer', '$bts', '$tgl_keluar', '$jumlah_keluar', '$id_engineer', '$swos')"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-consumable-keluar.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
$sql = mysql_query("update consumable set jumlah_stok=jumlah_stok-'$jumlah_keluar' where id_consumable='$id_consumable'");
?>
