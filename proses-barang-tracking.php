<?php 
session_start();


#POST
$swosorder	= $_POST['swosorder'];
$swosjob	= $_POST['swosjob'];
$po		= $_POST['po'];
$barang		= $_POST['nama_barang'];
$jumlah		= $_POST['jumlah_barang'];
$harga		= $_POST['harga'];
$status		= $_POST['status_barang'];

include "koneksi.php";
$query	= mysql_query("insert into barang_tracking(swosorder,swosjob,po,nama_barang,jumlah_barang,harga,status_barang)
		value
		('$swosorder','$swosjob','$po','$barang','$jumlah','$harga','$status')
	");

if ($query){
	Header("Location: show-barang-tracking.php");
} else {
	print "Error<br>";
	print mysql_error();
	echo "<meta http-equiv=\"refresh\" content=\"1;tambah-barang-tracking.php\">";

}	
