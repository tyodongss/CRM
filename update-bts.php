<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$nama_bts=$_POST['nama_bts']; 
$alamat=$_POST['alamat']; 
$kontak=$_POST['kontak'];
$telephone=$_POST['telephone']; 
$tanggal_kontrak=$_POST['tanggal_kontrak'];  

$query ="update bts set nama_bts='$nama_bts', alamat='$alamat', kontak='$kontak', telephone='$telephone', tanggal_kontrak='$tanggal_kontrak', updated_at=NOW() where id_bts='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-bts.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
