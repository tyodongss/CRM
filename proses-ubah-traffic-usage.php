<?php
#Logging
include "proses-log.php";


date_default_timezone_set('Asia/Makassar');
session_start();

include "koneksi.php";

#POST	
$id_traff	= $_POST['id_traff'];
$id 		= $_POST['id_circuit'];
$idfix		= substr($id, 4);
$note		= substr($id, 0, 4);
$capdown	= $_POST['capacity_down'];
$capup		= $_POST['capacity_up'];
$usadown	= $_POST['usage_down'];
$usaup		= $_POST['usage_up'];
$periode	= $_POST['periode'];

#HITUNG
$percentdown = ($usadown/$capdown)*100;
$percentup = ($usaup/$capup)*100;

#NOTE
if ($note=="bts-"){
	$notefix = "bts";
} else {
	$notefix = "circuit";
}

$quer = mysql_query("update traffic_usage set id_circuit='$idfix', capacity_down='$capdown', capacity_up='$capup', periode='$periode', usage_down='$usadown', usage_up='$usaup', percent_down='$percentdown', percent_up='$percentup', notedb='$notefix' where id_traff='$id_traff'");

if ($quer){
	print "SUKSES";
#	echo "<meta http-equiv=\"refresh\" content=\"1;show-traffic-usage.php\">";
} else {
	print "ERROR<br>";
	print mysql_error();
}


?>
