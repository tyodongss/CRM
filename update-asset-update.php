<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$id_asset=$_POST['id_asset']; 
$nama_item=$_POST['nama_item']; 
$keterangan=$_POST['keterangan']; 
$jumlah_update=$_POST['jumlah_update']; 
$tgl_asset_update=$_POST['tgl_asset_update']; 
$id_customer=$_POST['id_customer'];
$id_bts=$_POST['id_bts'];  
$id_engineer=$_POST['id_engineer']; 
$swos=$_POST['swos'];   
$id_vendor=$_POST['id_vendor']; 
$status_rma=$_POST['status_rma'];  

$query=mysql_query("update asset_update set id_asset='$id_asset', keterangan='$keterangan', jumlah_update='$jumlah_update', tgl_asset_update='$tgl_asset_update', id_customer='$id_customer', id_bts='$id_bts', id_engineer='$id_engineer', swos='$swos', id_vendor='$id_vendor', status_rma='$status_rma', updated_at=NOW() where id_asset_update='$id'"); 

if($keterangan=="asset keluar"){ 
  $query2 = mysql_query("update asset set status_asset='tidak tersedia' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}
else if($keterangan=="asset dismantle"){ 
  $query3 = mysql_query("update asset set status_asset='tersedia' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}
if($status_rma=="dikirim RMA"){ 
  $query4 = mysql_query("update asset set status_asset='tidak tersedia' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}
else if($status_rma=="selesai RMA"){ 
  $query5 = mysql_query("update asset set status_asset='tersedia' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}else {
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
} 

/*
if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
*/
?> 
