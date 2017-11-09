<?php
$kode = $_GET['term'];
include "koneksi.php";
 
$sql = "select * from kategori_item where nama_kategori_item like '$kode%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['nama_kategori_item'],
		'value' => $rs['nama_kategori_item'],
		'id_kategori_item' => $rs['id_kategori_item']
	);
}
header("Content-Type: application/json");
echo json_encode($json);