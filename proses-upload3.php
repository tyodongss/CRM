<?
#Logging
include "proses-log.php";

session_start();
include_once 'koneksi.php';
if(isset($_POST['btn-upload']))
{    
    $email_engineer = $_SESSION['email_engineer'];
    $nama_engineer = $_SESSION['nama_engineer'];
    $id = $_POST['id'];
    $swos=$_POST['swos'];
    $nama_job_to_do=$_POST['nama_job_to_do'];
    $nama_owner=$_POST['nama_owner'];
    $email_owner=$_POST['email_owner'];
    $nama=$_POST['nama'];
    $nama_terima_pekerjaan=$_POST['nama_terima_pekerjaan'];  
    $datetime_open=$_POST['datetime_open'];
    $datetime_finish=$_POST['datetime_finish'];  
    $tipe_pekerjaan=$_POST['tipe_pekerjaan'];
    $priority_pekerjaan=$_POST['priority_pekerjaan'];
    $scope_pekerjaan=$_POST['scope_pekerjaan'];
    $nama_detail_pekerjaan=$_POST['nama_detail_pekerjaan'];
    $keterangan_pekerjaan=$_POST['keterangan_pekerjaan'];
    $status_charge=$_POST['status_charge'];
    $status_jobtodo=$_POST['status_jobtodo'];    
    $remark=$_POST['remark']; 
    $nama_engineer1=$_POST['nama_engineer1'];

$to = 'latifaa.latifaaa@gmail.com';   
$subject = "CRM - " . $swos . "\r\n" . $nama_customer . "\r\n" . $nama_job_to_do;

$fileatt = $_FILES['fileatt']['tmp_name'];
$fileatt_type = $_FILES['fileatt']['type'];
$fileatt_name = $_FILES['fileatt']['name'];

$header = "From : CRM $nama_engineer <$email_engineer> <>\r\n";

if (is_uploaded_file($fileatt)) {
$file = fopen($fileatt,'rb');
$data = fread($file,filesize($fileatt));
fclose($file);
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";
$message = 'Email with message ' .
"--{$mime_boundary}\n" .
"Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . '
<p><font size="2" face="Tahoma"><strong>Update Job To Do for <span style="color: rgb(133, 58, 133);">'. $nama_customer .'</span></strong></font></p>
<p><font size="2" face="Tahoma"><span style="color: rgb(255, 102, 0);"></span>Job To Do details:</font></p>
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
</table>' . "\n\n";
$data = chunk_split(base64_encode($data));

$message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}--\n";
}

$ok = @mail($to, $subject, $message, $headers);
if ($ok) {
echo "<p>Email sudah dikirim</p>";
} else {
echo "<p>Email gagal terkirim!</p>";
}}
?>
