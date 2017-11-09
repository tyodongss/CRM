<?php

session_start();
include "koneksi.php";

/*$email_engineer = $_SESSION['email_engineer'];
$nama_engineer = $_SESSION['nama_engineer'];
$id_job=$_POST['id_job'];
$swos=$_POST['swos'];
$nama_job_to_do=$_POST['nama_job_to_do'];
$id_owner=$_POST['id_owner'];
$email_owner = $_POST['email_owner'];
$id_customer=$_POST['id_customer'];
$nama_customer=$_POST['nama_customer'];
$id_engineer=$_POST['id_engineer'];
//$email_engineer = $_POST['email_engineer'];
$id_engineer2=$_POST['id_engineer2'];
$id_engineer3=$_POST['id_engineer3'];
$id_engineer4=$_POST['id_engineer4'];
$nama_engineer1=$_POST['nama_engineer1'];
$nama_engineer2=$_POST['nama_engineer2'];
$nama_engineer3=$_POST['nama_engineer3'];
$nama_engineer4=$_POST['nama_engineer4'];
$id_terima_pekerjaan=$_POST['id_terima_pekerjaan'];  
$nama_terima_pekerjaan=$_POST['nama_terima_pekerjaan'];
$datetime_open=$_POST['datetime_open'];
$datetime_finish=$_POST['datetime_finish'];  
$tipe_pekerjaan=$_POST['tipe_pekerjaan'];
$priority_pekerjaan=$_POST['priority_pekerjaan'];
$scope_pekerjaan=$_POST['scope_pekerjaan'];
$id_detail_pekerjaan=$_POST['id_detail_pekerjaan'];
$nama_detail_pekerjaan=$_POST['nama_detail_pekerjaan'];
$keterangan_pekerjaan=$_POST['keterangan_pekerjaan'];
$status_charge=$_POST['status_charge'];
$status_jobtodo=$_POST['status_jobtodo'];
$remark=$_POST['remark'];
*/

$name_job=$_POST['name_job'];
$id_type=$_POST['id_type'];
$id_support_parts=$_POST['id_support_parts'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$id_customer=$_POST['id_customer'];
$request_date=$_POST['request_date'];
$requester=$_POST['requester'];
$id_engineer1=$_POST['id_engineer1'];
$id_engineer2=$_POST['id_engineer2'];
$id_engineer3=$_POST['id_engineer3'];
$id_engineer4=$_POST['id_engineer4'];
$hw_state=$_POST['hw_state'];
$application_state=$_POST['application_state'];
$db_state=$_POST['db_state'];
$contract_condition=$_POST['contract_condition'];
$caused_by=$_POST['caused_by'];
$support=$_POST['support'];
$recommendation=$_POST['recommendation'];
$status_job=$_POST['status_job'];
$remark=$_POST['remark'];
 
$a=mysql_query("insert into job (name_job, id_type, id_support_parts, start_time, end_time, id_customer, request_date, requester, hw_state, application_state, db_state, contract_condition, caused_by, support, recommendation, status_job, remark) value       
('$name_job', '$id_type', '$id_support_parts', '$start_time', '$end_time', '$id_customer', '$request_date', '$requester', '$hw_state', '$application_state', '$db_state', '$contract_condition', '$caused_by', '$support', '$recommendation', '$status_job', '$remark')");

$id_job = mysql_insert_id();

$b=mysql_query("insert into detail_job (id_job, id_engineer) value ('$id_job', '$id_engineer1')");
$c=mysql_query("insert into detail_job (id_job, id_engineer) value ('$id_job', '$id_engineer2')");
$d=mysql_query("insert into detail_job (id_job, id_engineer) value ('$id_job', '$id_engineer3')");
$e=mysql_query("insert into detail_job (id_job, id_engineer) value ('$id_job', '$id_engineer4')");

/*$to = $email_owner;

$title = "CRM - " . $swos . "\r\n" . $nama_customer . "\r\n" . $nama_job_to_do;

$txt ='
<p><font size="2" face="Tahoma"><strong>A new Job To Do for <span style="color: rgb(133, 58, 133);">'. $nama_customer .'</span></strong></font></p>
<p><font size="2" face="Tahoma"><span style="color: rgb(255, 102, 0);"></span>Job To Do details:</font></p>
<table width="100%" cellspacing="0" cellpadding="0" border="1" summary="">
    <tbody>
        <tr>
            <td>
            <table width="100%" cellspacing="0" cellpadding="1" border="0" summary="">
                <tbody>
                    <tr>
                        <td width="32%" valign="top" align="left"><font size="2" face="Verdana">Job ID</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $id_job .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">SWOS</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $swos .'</strong></font></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Nama Job To Do</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_job_to_do .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Customer</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_customer .'</strong></font></td>
                    </tr>
                      <tr>
                        <td><font size="2" face="Verdana">Engineer 1</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_engineer1 .'</strong></font></td>
                    </tr>
                      <tr>
                        <td><font size="2" face="Verdana">Engineer 2</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_engineer2 .'</strong></font></td>
                    </tr>
                      <tr>
                        <td><font size="2" face="Verdana">Engineer 3</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_engineer3 .'</strong></font></td>
                    </tr>
                      <tr>
                        <td><font size="2" face="Verdana">Engineer 4</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_engineer4 .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Terima Pekerjaan Dari</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_terima_pekerjaan .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Datetime Open</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $datetime_open .'</strong></font></td>
                    </tr>
                    <tr>
                        <td width="20%" valign="top" align="left"><font size="2" face="Verdana">Datetime Finish</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $datetime_finish .'</strong></font></td>
                    </tr>
                    <tr>
                        <td width="32%"><font size="2" face="Verdana">Tipe Pekerjaan</font></td>
                        <td><font face="Verdana"><font size="2">: <strong>'. $tipe_pekerjaan .'</strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Priority Pekerjaan</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(0, 255, 0);">'. $priority_pekerjaan .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td width="20%" valign="top" align="left"><font size="2" face="Verdana">Scope Pekerjaan</font></td>
                        <td><font face="Verdana"><font size="2">: <strong>'. $scope_pekerjaan .'</strong></font></font></td>
                    </tr>
                    <tr>
                        <td width="20%" valign="top" align="left"><font size="2" face="Verdana">Detail Pekerjaan</font></td>
                        <td><font face="Verdana"><font size="2">: <strong>'. $nama_detail_pekerjaan .'</strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Status Charge</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 128, 64);">'. $status_charge .'</font></strong></font></font></td>
                    </tr>
                     <tr>
                        <td><font size="2" face="Verdana">Status</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 255, 0);">'. $status_jobtodo .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Remark</font></td>
                         <td><font face="Verdana"><font size="2">: <strong>'. $remark .'</strong></font></font></td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" cellspacing="0" cellpadding="0" border="1" summary="">
                <tbody>
                    <tr>
                        <td><font size="2" face="Verdana">'. $keterangan_pekerjaan .'</font></td>
                    </tr>
                </tbody>
            </table>
            </td>
        </tr>
    </tbody>
</table>
';

$header = "From : CRM $nama_engineer <$email_engineer> <>\r\n" . 
"MIME-Version: 1.0\n" . 
"Content-type: text/html; charset=iso-8859-1";

mail($to,$title,$txt,$header); 
*/
if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-job-to-do.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}


?>
