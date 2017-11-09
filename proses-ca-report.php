<?php
# Logging
include "proses-log.php";

include "koneksi.php";

$id_ca_request=$_POST['id_ca_request'];
$id_engineer=$_POST['id_engineer'];
$id_ca_kategori=$_POST['id_ca_kategori'];
$tgl_report=$_POST['tgl_report'];
$jumlah=$_POST['jumlah'];
$keterangan=$_POST['keterangan'];
$note_asli=$_POST['note_asli'];
$status_ca_report=$_POST['status_ca_report'];

$a=mysql_query("insert into ca_report (id_ca_request, id_engineer, id_ca_kategori, tgl_report, jumlah, keterangan, note_asli, status_ca_report) 
value       
('$id_ca_request', '$id_engineer', '$id_ca_kategori', '$tgl_report', '$jumlah','$keterangan', '$note_asli',  '$status_ca_report')");

if ($a){
echo "<meta http-equiv=\"refresh\" content=\"1;show-ca-report.php\">";
}
else {
echo "Gagal Simpan";
echo mysql_error(); 
}
?>
