<?php
$menu 		= $_GET['menu'];
$db		= $_GET['cat'];
$periode	= $_GET['periode'];
$id		= $_GET['id'];

require_once 'database.php';

if ($menu == "summary"){
	$stmt = $conn->prepare("select * from traffic_usage where notedb='$db' and periode='$periode' order by id_circuit asc");
} else {
	$stmt = $conn->prepare("select * from traffic_usage where notedb='$db' and id_circuit='$id' order by periode asc");
}
		
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($results);

?>
