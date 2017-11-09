<?php 
# Logging
include "proses-log.php";

include "koneksi.php";

$id=$_POST['id'];
$id_ca_request=$_POST['id_ca_request']; 
$id_engineer=$_POST['id_engineer'];
$id_ca_kategori=$_POST['id_ca_kategori'];
$tgl_report=$_POST['tgl_report'];
$jumlah=$_POST['jumlah'];
$keterangan=$_POST['keterangan'];
$note_asli=$_POST['note_asli'];
$status_ca_report=$_POST['status_ca_report'];   

$query=mysql_query("update ca_report set id_ca_request='$id_ca_request', id_engineer='$id_engineer',  id_ca_kategori='$id_ca_kategori', tgl_report='$tgl_report', jumlah='$jumlah', keterangan='$keterangan', note_asli='$note_asli', status_ca_report='$status_ca_report', updated_at=NOW() where id_ca_report='$id'"); 

if($query){ 
  echo "<font color='white'>Berhasil Simpan</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-ca-report.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
