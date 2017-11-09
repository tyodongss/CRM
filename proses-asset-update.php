<?php
# Logging
include "proses-log.php";

include "koneksi.php";
$id_asset=$_POST['id_asset'];
$keterangan=$_POST['keterangan'];
$jumlah_update=$_POST['jumlah_update'];
$tgl_asset_update=$_POST['tgl_asset_update'];
$id_customer=$_POST['id_customer'];
$id_bts=$_POST['id_bts'];
$id_engineer=$_POST['id_engineer'];
$swos=$_POST['swos'];
$id_vendor=$_POST['id_vendor'];
$status_rma=$_POST['status_rma'];

$query=mysql_query("insert into asset_update(id_asset, keterangan, jumlah_update, tgl_asset_update, id_customer, id_bts, id_engineer, swos, id_vendor, status_rma) value('$id_asset','$keterangan','$jumlah_update','$tgl_asset_update','$id_customer','$id_bts','$id_engineer','$swos','$id_vendor','$status_rma')"); 

if($keterangan=="asset masuk"){ 
  $query2 = mysql_query("update asset set jumlah_stok=jumlah_stok+'$jumlah_update' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}
else if($keterangan=="asset keluar"){ 
  $query2 = mysql_query("update asset set status_asset='tidak tersedia', jumlah_stok=jumlah_stok-'$jumlah_update' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}
else if($keterangan=="asset dismantle"){ 
  $query3 = mysql_query("update asset set status_asset='tersedia', jumlah_stok=jumlah_stok+'$jumlah_update' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}
else if($status_rma=="dikirim RMA"){ 
  $query4 = mysql_query("update asset set status_asset='tidak tersedia', jumlah_stok=jumlah_stok-'$jumlah_update' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}
else if($status_rma=="selesai RMA"){ 
  $query5 = mysql_query("update asset set status_asset='tersedia', jumlah_stok=jumlah_stok+'$jumlah_update' where id_asset='$id_asset'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
}else {
  echo "<meta http-equiv=\"refresh\" content=\"1;show-asset-update.php\">";
} 
?>
