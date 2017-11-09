<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$code_item=$_POST['code_item'];
$nama_item=$_POST['nama_item'];
$id_kategori_item=$_POST['id_kategori_item'];
$id_brand=$_POST['id_brand'];
$id_owner=$_POST['id_owner'];
$id_lokasi=$_POST['id_lokasi'];
$id_toolbox=$_POST['id_toolbox'];
$id_vendor=$_POST['id_vendor'];
$serial_number=$_POST['serial_number'];
$jumlah_awal=$_POST['jumlah_awal'];
$jumlah_stok=$_POST['jumlah_stok'];
$kondisi=$_POST['kondisi'];
$po_number=$_POST['po_number'];
$tgl_masuk=$_POST['tgl_masuk'];
$status_tools=$_POST['status_tools'];
$nilai_perolehan=$_POST['nilai_perolehan'];
$umur=$_POST['umur'];
$remark=$_POST['remark']; 

$query=mysql_query("insert into tools(code_item, id_kategori_item, id_brand, id_owner, id_lokasi, id_toolbox, id_vendor, serial_number, jumlah_awal, jumlah_stok, kondisi, po_number, tgl_masuk, status_tools, nilai_perolehan, umur, remark) 
  value('$code_item', '$id_kategori_item', '$id_brand', '$id_owner', '$id_lokasi', '$id_toolbox', '$id_vendor', '$serial_number', '$jumlah_awal', '$jumlah_stok', '$kondisi', '$po_number','$tgl_masuk', '$status_tools', '$nilai_perolehan', '$umur', '$remark')"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
