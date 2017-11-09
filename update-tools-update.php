<?php 
# Logging
include "proses-log.php";


include "koneksi.php"; 
$id=$_POST['id']; 
$id_tools=$_POST['id_tools']; 
$nama_item=$_POST['nama_item']; 
$keterangan=$_POST['keterangan']; 
$jumlah_update=$_POST['jumlah_update'];
$tgl_tools_update=$_POST['tgl_tools_update']; 
$id_customer=$_POST['id_customer'];  
$id_engineer=$_POST['id_engineer']; 
$swos=$_POST['swos'];   
$id_vendor=$_POST['id_vendor']; 
$status_rma=$_POST['status_rma'];  

$query=mysql_query("update tools_update set id_tools='$id_tools', keterangan='$keterangan', jumlah_update='$jumlah_update', tgl_tools_update='$tgl_tools_update', id_customer='$id_customer', id_engineer='$id_engineer', swos='$swos', id_vendor='$id_vendor', status_rma='$status_rma', updated_at=NOW() where id_tools_update='$id'"); 

if($keterangan=="tools keluar"){ 
  $query2 = mysql_query("update tools set status_tools='tidak tersedia' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}
else if($keterangan=="tools dismantle"){ 
  $query3 = mysql_query("update tools set status_tools='tersedia' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}
if($status_rma=="dikirim RMA"){ 
  $query4 = mysql_query("update tools set status_tools='tidak tersedia' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}
else if($status_rma=="selesai RMA"){ 
  $query5 = mysql_query("update tools set status_tools='tersedia' where id_tools='$id_tools'");
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}else {
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
} 

/*
if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools-update.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
*/
?> 
