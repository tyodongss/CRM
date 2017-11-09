<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$id_consumable=$_POST['id_consumable']; 
$id_customer=$_POST['id_customer']; 
$bts=$_POST['bts']; 
$tgl_keluar=$_POST['tgl_keluar'];
$jumlah_keluar=$_POST['jumlah_keluar'];
$id_engineer=$_POST['id_engineer'];
$swos=$_POST['swos'];  

$query=mysql_query("update consumable_keluar set id_consumable='$id_consumable', id_customer='$id_customer', bts='$bts', tgl_keluar='$tgl_keluar', jumlah_keluar='$jumlah_keluar', id_engineer='$id_engineer', swos='$swos', updated_at=NOW() where id_consumable_keluar='$id'"); 

if($query){ 
  echo "<font color='white'>Berhasil Simpan</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-consumable-keluar.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
