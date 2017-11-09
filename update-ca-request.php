<?php 
# Logging
include "proses-log.php";

session_start();
include "koneksi.php";

$id=$_POST['id'];
$nama_engineer = $_SESSION['nama_engineer'];
$email_engineer = $_SESSION['email_engineer'];
$swos=$_POST['swos'];
$id_ca_budget=$_POST['id_ca_budget'];
$judul_ca_budget=$_POST['judul_ca_budget'];
$id_paa=$_POST['id_paa'];
$nama_paa=$_POST['nama_paa'];
$tgl_request=$_POST['tgl_request'];
$tgl_approve=$_POST['tgl_approve'];
$id_job_to_do=$_POST['id_job_to_do'];
$nama_job_to_do=$_POST['nama_job_to_do'];
$judul_ca=$_POST['judul_ca'];
$keterangan=$_POST['keterangan'];
$jumlah=$_POST['jumlah'];
$id_engineer=$_POST['id_engineer'];
$nama_engineer1=$_POST['nama_engineer1'];
$status_approval=$_POST['status_approval'];
$status_ca_request=$_POST['status_ca_request']; 
$jumlah_sisa_ca=$_POST['jumlah_sisa_ca']; 
$status_ca_report_confirm=$_POST['status_ca_report_confirm'];
$status_ca_report_approval=$_POST['status_ca_report_approval'];

$query=mysql_query("update ca_request set swos='$swos', id_ca_budget='$id_ca_budget',  id_paa='$id_paa', tgl_request='$tgl_request', tgl_approve='$tgl_approve', id_job_to_do='$id_job_to_do', judul_ca='$judul_ca', keterangan='$keterangan', jumlah='$jumlah', id_engineer='$id_engineer', status_approval='$status_approval', status_ca_request='$status_ca_request', updated_at=NOW() where id_ca_request='$id'"); 

$to = 'marky@satnetcom.com,rosmauli@satnetcom.com,kusniyah@satnetcom.com';

$title = 'Update CA Request by'."\r".$nama_engineer;

$txt ='
<p><font size="2" face="Tahoma"><strong>Update CA Request by <span style="color: rgb(133, 58, 133);">'. $nama_engineer .'</span></strong></font></p>
<p><font size="2" face="Tahoma"><span style="color: rgb(255, 102, 0);"></span>CA Request details:</font></p>
<table width="100%" cellspacing="0" cellpadding="0" border="1" summary="">
    <tbody>
        <tr>
            <td>
            <table width="100%" cellspacing="0" cellpadding="1" border="0" summary="">
                <tbody>
                    <tr>
                        <td width="32%" valign="top" align="left"><font size="2" face="Verdana">SWOS</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $swos .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Budget</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $judul_ca_budget .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Nama PAA</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_paa .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Tanggal Request</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $tgl_request .'</strong></font></td>
                    </tr>
                      <tr>
                        <td><font size="2" face="Verdana">Tanggal Approve</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $tgl_approve .'</strong></font></td>
                    </tr>
                      <tr>
                        <td><font size="2" face="Verdana">Nama Job To Do</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_job_to_do .'</strong></font></td>
                    </tr>
                      <tr>
                        <td><font size="2" face="Verdana">Judul CA</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $judul_ca .'</strong></font></td>
                    </tr>
                      <tr>
                        <td><font size="2" face="Verdana">Keterangan CA</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $keterangan .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Jumlah CA</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 255, 0);">Rp '. number_format($jumlah,2,',','.') .'</font></strong></font></font></td>
                    </tr>
                     <tr>
                        <td><font size="2" face="Verdana">Jumlah Sisa CA</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 66, 66);">Rp '. number_format($jumlah_sisa_ca,2,',','.') .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Nama Engineer</font></td>
                        <td><font size="2" face="Verdana">: <strong>'. $nama_engineer1 .'</strong></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Status Approval</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(0, 255, 0);">'. $status_approval .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Status CA Request</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 128, 64);">'. $status_ca_request .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Status CA Report Confirm</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(153, 217, 234);">'. $status_ca_report_confirm .'</font></strong></font></font></td>
                    </tr>
                    <tr>
                        <td><font size="2" face="Verdana">Status CA Report Approval</font></td>
                        <td><font face="Verdana"><font size="2">: <strong><font style="background-color: rgb(255, 128, 255);">'. $status_ca_report_approval .'</font></strong></font></font></td>
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
  echo "<font color='white'>Berhasil Simpan</font>";
  echo "<meta http-equiv=\"refresh\" content=\"1;show-ca-request.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 
?> 
