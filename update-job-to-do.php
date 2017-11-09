<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
 
$id=$_POST['id']; 
$name_job=$_POST['name_job'];
$id_type=$_POST['id_type'];
$id_support_parts=$_POST['id_support_parts'];
$start_time=$_POST['start_time'];  
$end_time=$_POST['end_time'];
$id_customer=$_POST['id_customer'];  
$request_date=$_POST['request_date'];
$requester=$_POST['requester'];
$hw_state=$_POST['hw_state'];
$application_state=$_POST['application_state'];
$db_state=$_POST['db_state'];
$contract_condition=$_POST['contract_condition'];
$caused_by=$_POST['caused_by'];    
$support=$_POST['support']; 
$recommendation=$_POST['recommendation']; 
$status_job=$_POST['status_job'];
$remark=$_POST['remark'];


$query=mysql_query("update job set name_job='$name_job', id_type='$id_type', id_support_parts='$id_support_parts', start_time='$start_time', end_time='$end_time', id_customer='$id_customer', request_date='$request_date', requester='$requester', hw_state='$hw_state', application_state='$application_state',  db_state='$db_state', contract_condition='$contract_condition', caused_by='$caused_by', support='$support', recommendation='$recommendation', status_job='$status_job', remark='$remark', updated_at=NOW() where id_job='$id'"); 

if($query){ 
  echo "<font color='white'>Save successful</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-job-to-do.php\">";
}else{
  echo "Failed input data"; 
  echo mysql_error(); 
} 
?> 
