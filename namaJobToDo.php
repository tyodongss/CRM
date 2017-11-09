<?php
$kode = $_GET['term'];
include "koneksi.php";
 
$sql = "select job.id_job, job.name_job from job where id_job like '$kode%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['id_job'],
		'value' => $rs['id_job'],
		'name_job' => $rs['name_job']
	);
}
header("Content-Type: application/json");
echo json_encode($json);