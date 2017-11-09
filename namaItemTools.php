<?php
$kode = $_GET['term'];
include "koneksi.php";
 
$sql = "select item.nama_item from item, tools where tools.code_item=item.code_item and item.nama_item like '%kode'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['nama_item'],
		'value' => $rs['nama_item'],
		'code_item' => $rs['code_item']
	);
}
header("Content-Type: application/json");
echo json_encode($json);