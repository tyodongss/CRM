<?php
session_start();
include "koneksi.php";

if ($_SESSION['id']!=""){
	$id = $_SESSION['id'];
	$session = $_SERVER['UNIQUE_ID'];
	$requri = $_SERVER['REQUEST_URI'];
	$method = $_SERVER['REQUEST_METHOD'];
	$rip = $_SERVER['REMOTE_ADDR'];
	$ua = $_SERVER['HTTP_USER_AGENT'];
	
	$query = mysql_query("insert into logaccess(id_engineer, sessionid, request_uri, method, remoteip, useragent, time) value ('$id', '$session', '$requri', '$method', '$rip', '$ua', now())");

	if ($query){

	} else {

	}

} else {
	header ("Location: index.php");
}
?>
