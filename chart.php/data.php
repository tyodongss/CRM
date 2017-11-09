<?php
$id = $_GET['id_circuit'];
$bulan1 = $_GET['id_bulan1'];
$bulan2 = $_GET['id_bulan2'];
$tahun1 = $_GET['id_tahun1'];
$tahun2 = $_GET['id_tahun2'];
$menu = $_GET['menu'];

$periode1 = $tahun1.'-'.$bulan1;
$periode2 = $tahun2.'-'.$bulan2;

require_once 'database.php';


if ($menu == "sum"){
	$stmt = $conn->prepare("select * from backbone_history where id_circuit='$id' order by periode asc");
} else if ($menu == "3month"){
	$start = date('Y-m', strtotime('-2 month'));
	$end = date('Y-m');
	$stmt = $conn->prepare("select * from backbone_history where id_circuit='$id' and periode >= '$start' and periode <= '$end' order by periode asc");
} else {
	$stmt = $conn->prepare("select * from backbone_history where id_circuit='$id' and periode >= '$periode1' and periode <= '$periode2' order by periode asc");
//	$stmt = $conn->prepare("select * from backbone_history where id_circuit='$id' and periode between '$periode1' and '$periode2' order by periode asc");
}

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($results);

?>
