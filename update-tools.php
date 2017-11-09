<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$code_item=$_POST['code_item']; 
$nama_item=$_POST['nama_item']; 
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

$query=mysql_query("update tools set code_item='$code_item', id_brand='$id_brand', id_owner='$id_owner', id_lokasi='$id_lokasi', id_toolbox='$id_toolbox', id_vendor='$id_vendor', serial_number='$serial_number', jumlah_awal='$jumlah_awal', jumlah_stok='$jumlah_stok', kondisi='$kondisi', po_number='$po_number', tgl_masuk='$tgl_masuk', status_tools='$status_tools', nilai_perolehan='$nilai_perolehan', umur='$umur', remark='$remark', updated_at=NOW() where id_tools='$id'"); 

if($query){ 
  echo "<font color='white'>Berhasil Simpan</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-tools.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
