<?php
$kode = $_GET['term'];
include "koneksi.php";
 
$sql = "select toolbox.nama_toolbox from toolbox, tools where tools.id_toolbox=item.id_toolbox and toolbox.nama_toolbox like '%kode'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['code_item'],
		'value' => $rs['code_item'],
		'nama_toolbox' => $rs['nama_toolbox']
	);
}
header("Content-Type: application/json");
echo json_encode($json);