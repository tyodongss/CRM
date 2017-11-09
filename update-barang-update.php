<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$id_barang=$_POST['id_barang']; 
$nama_item=$_POST['nama_item']; 
$keterangan=$_POST['keterangan']; 
$tgl_barang_update=$_POST['tgl_barang_update']; 
$id_customer=$_POST['id_customer'];
$id_bts=$_POST['id_bts'];  
$id_engineer=$_POST['id_engineer']; 
$swos=$_POST['swos'];   
$id_vendor=$_POST['id_vendor']; 
$status_rma=$_POST['status_rma'];  

$query=mysql_query("update barang_update set id_barang='$id_barang', keterangan='$keterangan', tgl_barang_update='$tgl_barang_update', id_customer='$id_customer', id_bts='$id_bts', id_engineer='$id_engineer', swos='$swos', id_vendor='$id_vendor', status_rma='$status_rma', updated_at=NOW() where id_barang_update='$id'"); 

if($keterangan=="barang keluar"){ 
  $query2 = mysql_query("update barang set status_barang='tidak tersedia' where id_barang='$id_barang'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang-update.php\">";
}
else if($keterangan=="barang dismantle"){ 
  $query3 = mysql_query("update barang set status_barang='tersedia' where id_barang='$id_barang'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang-update.php\">";
}
if($status_rma=="dikirim RMA"){ 
  $query4 = mysql_query("update barang set status_barang='tidak tersedia' where id_barang='$id_barang'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang-update.php\">";
}
else if($status_rma=="selesai RMA"){ 
  $query5 = mysql_query("update barang set status_barang='tersedia' where id_barang='$id_barang'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang-update.php\">";
}else {
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang-update.php\">";
} 

/*
if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang-update.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
*/
?> 
