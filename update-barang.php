<?php 
# Logging
include "proses-log.php";

include "koneksi.php"; 
$id=$_POST['id']; 
$code_item=$_POST['code_item']; 
$nama_item=$_POST['nama_item']; 
$id_owner=$_POST['id_owner']; 
$id_lokasi=$_POST['id_lokasi']; 
$id_vendor=$_POST['id_vendor']; 
$mac=$_POST['mac']; 
$serial_number=$_POST['serial_number'];
$harga=$_POST['harga']; 
$harga_usd=$_POST['harga_usd'];
$kondisi=$_POST['kondisi']; 
$po_number=$_POST['po_number'];  
$tgl_masuk=$_POST['tgl_masuk'];
$status_barang=$_POST['status_barang'];
$tgl_qc=$_POST['tgl_qc'];
$id_engineer=$_POST['id_engineer'];
$status_qc=$_POST['status_qc'];     
$remark=$_POST['remark'];  

$query=mysql_query("update barang set code_item='$code_item', id_owner='$id_owner', id_lokasi='$id_lokasi', id_vendor='$id_vendor', mac='$mac', serial_number='$serial_number', harga='$harga', harga_usd='$harga_usd', kondisi='$kondisi', po_number='$po_number', tgl_masuk='$tgl_masuk', status_barang='$status_barang', tgl_qc='$tgl_qc', id_engineer='$id_engineer', status_qc='$status_qc', remark='$remark', updated_at=NOW() where id_barang='$id'"); 

if($query){ 
  echo "<font color='white'>Berhasil Simpan</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
