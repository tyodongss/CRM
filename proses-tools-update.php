<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$id_tools=$_POST['id_tools'];
$keterangan=$_POST['keterangan'];
$jumlah_update=$_POST['jumlah_update'];
$tgl_tools_update=$_POST['tgl_tools_update'];
$id_customer=$_POST['id_customer'];
$id_engineer=$_POST['id_engineer'];
$swos=$_POST['swos'];
$id_vendor=$_POST['id_vendor'];
$status_rma=$_POST['status_rma'];

$query=mysql_query("insert into tools_update(id_tools, keterangan, jumlah_update,tgl_tools_update, id_customer, id_engineer, swos, id_vendor, status_rma) value('$id_tools','$keterangan','$jumlah_update','$tgl_tools_update','$id_customer','$id_engineer','$swos','$id_vendor','$status_rma')"); 

if($keterangan=="tools masuk"){ 
  $query2 = mysql_query("update tools set jumlah_stok=jumlah_stok+'$jumlah_update' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}
else if($keterangan=="tools keluar"){ 
  $query2 = mysql_query("update tools set status_tools='tidak tersedia', jumlah_stok=jumlah_stok-'$jumlah_update' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}
else if($keterangan=="tools dismantle"){ 
  $query3 = mysql_query("update tools set status_tools='tersedia', jumlah_stok=jumlah_stok+'$jumlah_update' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}
else if($status_rma=="dikirim RMA"){ 
  $query4 = mysql_query("update tools set status_tools='tidak tersedia', jumlah_stok=jumlah_stok-'$jumlah_update' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}
else if($status_rma=="selesai RMA"){ 
  $query5 = mysql_query("update tools set status_tools='tersedia', jumlah_stok=jumlah_stok+'$jumlah_update' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}else {
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
} 

?>
