<?php
$kode = $_GET['term'];
include "koneksi.php";
 
$sql = "select * from owner where id_owner like '$kode%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['id_owner'],
		'value' => $rs['id_owner'],
		'email_owner' => $rs['email_owner']
	);
}
header("Content-Type: application/json");
echo json_encode($json);