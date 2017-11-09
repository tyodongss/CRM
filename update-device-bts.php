<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$nama_device=$_POST['nama_device']; 
$id_bts=$_POST['id_bts']; 
$ssid=$_POST['ssid'];
$id_band=$_POST['id_band']; 
$channel_width=$_POST['channel_width'];
$id_frequency=$_POST['id_frequency'];
$ipaddress=$_POST['ipaddress'];
$radio_name=$_POST['radio_name'];
$id_kind_radio=$_POST['id_kind_radio'];
$mac=$_POST['mac'];
$id_security=$_POST['id_security'];
$mode=$_POST['mode'];
$power=$_POST['power'];
$card=$_POST['card'];
$rb=$_POST['rb'];
$remark=$_POST['remark'];  

$query = "update device_bts set nama_device='$nama_device', id_bts='$id_bts', ssid='$ssid', id_band='$id_band', channel_width='$channel_width', id_frequency='$id_frequency', ipaddress='$ipaddress', radio_name='$radio_name', id_kind_radio='$id_kind_radio', mac='$mac', id_security='$id_security', mode='$mode', power='$power', card='$card', rb='$rb', remark='$remark', updated_at=NOW() where id_device_bts='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-device-bts.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
