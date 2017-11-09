<?php
#Logging
include "proses-log.php";

session_start();
include "koneksi.php";

$email_engineer = $_SESSION['email_engineer'];
$nama_engineer = $_SESSION['nama_engineer'];
$id_ca_request=$_POST['id_ca_request'];
$judul_ca=$_POST['judul_ca'];
$status_ca_report_confirm=$_POST['status_ca_report_confirm'];
$jumlah_sisa_ca=$_POST['jumlah_sisa_ca'];
$id_ca_budget=$_POST['id_ca_budget'];

$query=mysql_query("update ca_request set status_ca_report_confirm='$status_ca_report_confirm', status_ca_report_approval='Not Approved', jumlah_sisa_ca ='$jumlah_sisa_ca', updated_at=NOW() where id_ca_request='$id_ca_request'"); 

//if ($jumlah_sisa_ca < 0  ){
	//nothing to do
//	}
//	else {
//	$query2 = mysql_query("update ca_budget set jumlah_sisa=jumlah_sisa+'$jumlah_sisa_ca' where id_ca_budget='$id_ca_budget'");								
//	}

$to = 'marky@satnetcom.com, ade.leo@satnetcom.com, cahyo.harmoko@satnetcom.com, hendi.sutriono@satnetcom.com, rosmauli@satnetcom.com, kusniyah@satnetcom.com';

$title = "CRM - Submit Report CA for Check by Supervisor" . "\r" . $judul_ca;

$txt ='
<p><font size="2" face="Tahoma"><strong>A Submit Report CA by <span style="color: rgb(133, 58, 133);">'. $nama_engineer .'</span></strong></font></p>
<p><font size="2" face="Tahoma"><span style="color: rgb(255, 102, 0);"></span>Details:</font></p>
<table width="100%" cellspacing="0" cellpadding="0" border="1" summary="">
    <tbody>
        <tr>
            <td>
            <table width="100%" cellspacing="0" cellpadding="1" border="0" summary="">
                <tbody>
                    <tr>
                        <td width="32%" valign="top" align="left"><font size="2" face="Verdana">Judul CA Request</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $judul_ca .'</strong></font></td>
                    </tr>
                     <tr>
                        <td width="32%" valign="top" align="left"><font size="2" face="Verdana">Nama Engineer</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_engineer .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Jumlah Sisa CA</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 128, 64);">Rp '. number_format($jumlah_sisa_ca,2,',','.') .'</font></strong></font></font></td>
                    </tr>
                     <tr>
                        <td><font size="2" face="Verdana">Status Confirm CA Request</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 255, 0);">'. $status_ca_report_confirm .'</font></strong></font></font></td>
                    </tr>
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

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-ca-report.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
