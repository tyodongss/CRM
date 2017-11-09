<?php
#Logging
include "proses-log.php";

include "koneksi.php";

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

$a=mysql_query("insert into device_bts(nama_device,id_bts,ssid,id_band,channel_width,id_frequency,ipaddress,radio_name,id_kind_radio,mac,id_security,mode,power,card,rb,remark) value ('$nama_device','$id_bts','$ssid', '$id_band', '$channel_width', '$id_frequency', '$ipaddress', '$radio_name', '$id_kind_radio', '$mac', '$id_security', '$mode', '$power', '$card', '$rb', '$remark')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-device-bts.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}

?>
