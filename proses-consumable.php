<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$nama_consumable=$_POST['nama_consumable'];
$id_vendor=$_POST['id_vendor'];
$harga=$_POST['harga'];
$harga_usd=$_POST['harga_usd'];
$kondisi=$_POST['kondisi'];
$tgl_input=$_POST['tgl_input'];
$po_number=$_POST['po_number'];
$tgl_masuk=$_POST['tgl_masuk'];
$jumlah_awal=$_POST['jumlah_awal'];
$jumlah_stok=$_POST['jumlah_stok'];
$status_barang=$_POST['status_barang'];
$remark=$_POST['remark'];

 
$query=mysql_query("insert into consumable(nama_consumable, id_vendor, harga, harga_usd, kondisi, tgl_input, po_number, tgl_masuk, jumlah_awal ,jumlah_stok, status_barang, remark) value('$nama_consumable','$id_vendor', '$harga', '$harga_usd', '$kondisi','$tgl_input','$po_number','$tgl_masuk', '$jumlah_awal' ,'$jumlah_stok', '$status_barang', '$remark')"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-consumable.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
