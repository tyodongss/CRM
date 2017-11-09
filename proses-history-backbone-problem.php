<?php
#Logging
include "proses-log.php";

date_default_timezone_set('Asia/Makassar');
session_start();

include "koneksi.php";

#POST
$id_circuit 	= $_POST['id_circuit'];
$periode	= $_POST['periode'];


$cal = CAL_GREGORIAN;
$month = date('m');
$year = date('Y');
$totalday = cal_days_in_month($cal, $month, $year);     #TOTAL HARI /BULAN
$totalhour = $totalday*24;                              #TOTAL JAM /BULAN
function time_to_decimal($time){
	$timeArr = explode(':', $time);
	$decTime = ($timeArr[0]) + ($timeArr[1]/60) + ($timeArr[2]/3600);
	return $decTime;
}
$tgl_awal = $periode."-01";
$tgl_akhir = $periode."-".$totalday;



$quer1 = mysql_query(
	"SELECT backbone_problem.id_circuit,SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(backbone_problem.datetime_end,backbone_problem.datetime_start)))) as total
	FROM backbone_problem,circuit
	WHERE
	backbone_problem.id_circuit=circuit.id_circuit AND
	backbone_problem.id_circuit='$id_circuit' AND
	datetime_start BETWEEN '$tgl_awal' AND '$tgl_akhir' AND
	description='Down'"
	);
	
$quer2 = mysql_query(
	"SELECT backbone_problem.id_circuit,SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(backbone_problem.datetime_end,backbone_problem.datetime_start)))) as total
	FROM backbone_problem,circuit
	WHERE
	backbone_problem.id_circuit=circuit.id_circuit AND
	backbone_problem.id_circuit='$id_circuit' AND
	datetime_start BETWEEN '$tgl_awal' AND '$tgl_akhir' AND
	description='Intermittent'"
	);

while ($record1=mysql_fetch_assoc($quer1)){
	$time = $record1['total'];
	$ttr1 = round(time_to_decimal($time), 2);
	$kpi1 = round($ttr1/$totalhour*100, 2);
	$sla = round(100-$kpi1, 2);
}

while ($record2=mysql_fetch_assoc($quer2)){
	$time = $record2['total'];
	$ttr2 = round(time_to_decimal($time), 2);
	$kpi2 = round($ttr2/$totalhour*100, 2);
	$sla2 = round(100-$kpi2, 2);
}

$quer3 = mysql_query("select id_backbone_problem from backbone_problem where id_circuit='$id_circuit' and datetime_start between '$tgl_awal' and '$tgl_akhir'");
$total_tt = mysql_num_rows($quer3);

#QUERY FIX
$cek = mysql_num_rows(mysql_query("select * from backbone_history where id_circuit='$id_circuit' and periode='$periode'"));

if ($cek > 0){
	print "Duplicate Data";
	echo "<meta http-equiv=\"refresh\" content=\"1;show-history-backbone-problem.php\">";
} else {
	$quer3 = mysql_query("
		INSERT INTO backbone_history 
		(id_circuit, periode, kpi_down, kpi_intermittent, sla_down, sla_intermittent, total_tt) 
		VALUE 
		('$id_circuit', '$periode', '$kpi1', '$kpi2', '$sla', '$sla2', '$total_tt')
		");
	if ($quer3) {
		echo "<meta http-equiv=\"refresh\" content=\"1;show-history-backbone-problem.php\">";
	} else {
		print "I/O Error<br>";
		print mysql_error;
	}
}

?>
