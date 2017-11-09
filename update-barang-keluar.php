<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$id_barang=$_POST['id_barang']; 
$id_customer=$_POST['id_customer'];
$bts=$_POST['bts'];  
$tanggal=$_POST['tanggal'];
$id_engineer=$_POST['id_engineer']; 
$swos=$_POST['swos'];   

$query=mysql_query("update barang_keluar set id_barang='$id_barang', id_customer='$id_customer', bts='$bts', tanggal='$tanggal', id_engineer='$id_engineer', swos='$swos', updated_at=NOW() where id_barangKeluar='$id'"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang-keluar.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
