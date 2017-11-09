<?php 
#Logging
include "proses-log.php";

session_start();
include "koneksi.php";

if ($_POST['menu']=="tambah"){
	$bts = $_POST['bts'];
	$typeups = $_POST['typeups'];
	$typebatt = $_POST['typebatt'];
	$loadups = $_POST['loadups'];
	$uptime = $_POST['uptime'];
	$testdate = $_POST['testdate'];
	$engineer = $_POST['engineer'];
	
	$quer = mysql_query("insert into bts_ups(id_bts,typeups,typebatt,loadups,uptime,testdate,engineer) value ('$bts','$typeups','$typebatt','$loadups','$uptime','$testdate','$engineer')");
	if ($quer){
		header ("Location: show-data-ups.php");
	} else {
		print "error<br>";
		print mysql_error();
		echo "<meta http-equiv=\"refresh\" content=\"1;tambah-data-ups.php\">";
	}

} else if ($_POST['menu']=="update"){
	$id = $_POST['id'];
	$typeups = $_POST['typeups'];
	$typebatt = $_POST['typebatt'];
	$loadups = $_POST['loadups'];
	$uptime = $_POST['uptime'];
	$testdate = $_POST['testdate'];

	$quer = mysql_query("update bts_ups set typeups='$typeups', typebatt='$typebatt', loadups='$loadups', uptime='$uptime', testdate='$testdate' where id='$id'");
	if ($quer){
		header ("Location: show-data-ups.php");
	} else {
		print "error<br>";
		print mysql_error();
		echo "<meta http-equiv=\"refresh\" content=\"1;show-data-ups.php\">";
	}

} else {

}
?>
