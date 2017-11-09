<?php 
# Logging
include "proses-log.php";

session_start();
include "koneksi.php";
 
$nama_engineer = $_SESSION['nama_engineer'];
$email_engineer = $_SESSION['email_engineer'];
$id=$_POST['id'];
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

$query=mysql_query("update ca_request set swos='$swos', id_ca_budget='$id_ca_budget',  id_paa='$id_paa', tgl_request='$tgl_request', tgl_approve='$tgl_approve', id_job_to_do='$id_job_to_do', judul_ca='$judul_ca', keterangan='$keterangan', jumlah='$jumlah', id_engineer='$id_engineer', status_approval='$status_approval', status_ca_request='$status_ca_request', updated_at=NOW() where id_ca_request='$id'"); 
//$query2 = mysql_query("update ca_budget set jumlah_sisa=jumlah_sisa-'$jumlah' where id_ca_budget='$id_ca_budget'");

$to = 'marky@satnetcom.com,rosmauli@satnetcom.com,kusniyah@satnetcom.com';

$title = 'New CA Request Approval for'."\r".$nama_engineer1;

$txt ='
<p><font size="2" face="Tahoma"><strong>A new CA Request Approval for <span style="color: rgb(133, 58, 133);">'. $nama_engineer1 .'</span></strong></font></p>
<p><font size="2" face="Tahoma"><span style="color: rgb(255, 102, 0);"></span>CA Request Approval details:</font></p>
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
  echo "<meta http-equiv=\"refresh\" content=\"1;show-ca-approval.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
} 

?> 
