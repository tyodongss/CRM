<?php
#Logging
include "proses-log.php";


date_default_timezone_set('Asia/Makassar');
session_start();

include "koneksi.php";

#POST	
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


#QUERY
$cek = mysql_num_rows(mysql_query("select * from traffic_usage where periode='$periode' and id_circuit='$idfix' and notedb='$notefix'"));

if ($cek >"0"){
	print "Duplicate Data";
	echo "<meta http-equiv=\"refresh\" content=\"1;show-traffic-usage.php\">";
} else {
$quer = mysql_query("insert into traffic_usage
        (id_circuit, capacity_down, capacity_up, periode, usage_down, usage_up, percent_down, percent_up, notedb)
        VALUE
        ('$idfix', '$capdown', '$capup', '$periode', '$usadown', '$usaup', '$percentdown', '$percentup', '$notefix')
        ");

	if ($quer){
		print "SUKSES";
#		echo "<meta http-equiv=\"refresh\" content=\"1;show-traffic-usage.php\">";
		echo "<meta http-equiv=\"refresh\" content=\"1;tambah-traffic-usage.php\">";
	} else {
		print "ERROR<br>";
		print mysql_error;
	}
}

?>
