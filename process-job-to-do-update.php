<?php
#Logging
include "proses-log.php";

include "koneksi.php";
session_start();

$id_job=$_POST['id_job'];
$id_engineer=$_POST['id_engineer'];
$date_update=$_POST['date_update'];
$support=$_POST['support'];

$a=mysql_query("insert into job_update(id_job,id_engineer,date_update,support) value ('$id_job', '$id_engineer', '$date_update', '$support')");

/*$to = $email_owner;

$title = "CRM - Job To Do Update for". "\r" . $nama_job_to_do;

$txt ='
<p><font size="2" face="Tahoma"><strong>A new Job To Do Update for <span style="color: rgb(133, 58, 133);">'. $nama_job_to_do .'</span></strong></font></p>
<p><font size="2" face="Tahoma"><span style="color: rgb(255, 102, 0);"></span>Job To Do Update details:</font></p>
<table width="100%" cellspacing="0" cellpadding="0" border="1" summary="">
    <tbody>
        <tr>
            <td>
            <table width="100%" cellspacing="0" cellpadding="1" border="0" summary="">
                <tbody>
                    <tr>
                        <td width="32%" valign="top" align="left"><font size="2" face="Verdana">Job ID</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $id_job_to_do .'</strong></font></td>
                    </tr> 
                    <tr>
                        <td><font size="2" face="Verdana">Judul Job To Do</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(0, 255, 0);">'. $nama_job_to_do .'</font></strong></font></font></td>
                    </tr>
                     <tr>
                        <td><font size="2" face="Verdana">Nama Engineer</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 255, 0);">'. $nama_engineer .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Datetime Update</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $tgl_update .'</strong></font></td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" cellspacing="0" cellpadding="0" border="1" summary="">
                <tbody>
                    <tr>
                        <td><font size="2" face="Verdana">'. $keterangan .'</font></td>
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
  echo "<meta http-equiv=\"refresh\" content=\"1;show-job-to-do-update.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}

?>
