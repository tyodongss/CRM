<?php
# Logging
include "proses-log.php";

include "koneksi.php";
session_start();

$nama_engineer = $_SESSION['nama_engineer'];
$email_engineer = $_SESSION['email_engineer'];
$id=$_POST['id'];
$status_ca_report_approval=$_POST['status_ca_report_approval'];
$status_ca_report_approval_manager=$_POST['status_ca_report_approval_manager'];
$judul_ca=$_POST['judul_ca'];
$jumlah=$_POST['jumlah'];
$jumlah_sisa_ca=$_POST['jumlah_sisa_ca'];
$nama_engineer1=$_POST['nama_engineer1'];

$query = "update ca_request set status_ca_report_approval_manager='$status_ca_report_approval_manager', updated_at=NOW() where id_ca_request='$id'"; 
$hasil = mysql_query($query);

$to = 'marky@satnetcom.com,rosmauli@satnetcom.com,kusniyah@satnetcom.com';

$title = 'New CA Report Approval by Manager for'."\r".$nama_engineer1;

$txt ='
<p><font size="2" face="Tahoma"><strong>A new CA Report Approval for <span style="color: rgb(133, 58, 133);">'. $nama_engineer1 .'</span></strong></font></p>
<p><font size="2" face="Tahoma"><span style="color: rgb(255, 102, 0);"></span>Details:</font></p>
<table width="100%" cellspacing="0" cellpadding="0" border="1" summary="">
    <tbody>
        <tr>
            <td>
            <table width="100%" cellspacing="0" cellpadding="1" border="0" summary="">
                <tbody>
                    <tr>
                        <td width="32%" valign="top" align="left"><font size="2" face="Verdana">Judul CA</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $judul_ca .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Nama Engineer</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_engineer1 .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Jumlah</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 255, 0);">Rp '. number_format($jumlah,2,',','.') .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Jumlah Sisa</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(0, 255, 0);">Rp '. number_format($jumlah_sisa_ca,2,',','.') .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Status CA Report Approval Supervisor</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 128, 64);">'. $status_ca_report_approval .'</font></strong></font></font></td>
                    </tr>
					<tr>
                        <td><font size="2" face="Verdana">Status CA Report Approval Manager</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 128, 64);">'. $status_ca_report_approval_manager .'</font></strong></font></font></td>
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

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-ca-report-approval-manager.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
?>
