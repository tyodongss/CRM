<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
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

$query=mysql_query("update consumable set nama_consumable='$nama_consumable', id_vendor='$id_vendor', harga='$harga', harga_usd='$harga_usd', kondisi='$kondisi', tgl_input='$tgl_input', po_number='$po_number', tgl_masuk='$tgl_masuk', jumlah_awal='$jumlah_awal', jumlah_stok='$jumlah_stok',status_barang='$status_barang', remark='$remark', updated_at=NOW() where id_consumable='$id'"); 

if($query){ 
  echo "<font color='white'>Berhasil Simpan</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-consumable.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
