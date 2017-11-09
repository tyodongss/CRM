<?php
$kode = $_GET['term'];
include "koneksi.php";
 
$sql = "select * from lokasi where nama_lokasi like '$kode%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['nama_lokasi'],
		'value' => $rs['nama_lokasi'],
		'id_lokasi' => $rs['id_lokasi']
	);
}
header("Content-Type: application/json");
echo json_encode($json);