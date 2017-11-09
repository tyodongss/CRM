<?php
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

	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="update job_to_do2 set file='$final_file', type='$file_type', size='$new_size' where id_job_to_do='$id'";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='upload.php?success';
        </script>
		<?php
	}

    $to = 'latifa@satnetcom.com';

$title = "CRM - " . $swos . "\r\n" . $nama_customer . "\r\n" . $nama_job_to_do;

$txt ='
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
</table>
';

    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;

$header = "From : CRM $nama_engineer <$email_engineer> <>\r\n" . 
"MIME-Version: 1.0\n" . 
"Content-type: text/html; charset=iso-8859-1";

$header .= "--" . $separator . $eol;
$header .= "Content-Type: application/octet-stream; name=\"" . $new_file_name . "\"" . $eol;
$header .= "Content-Transfer-Encoding: base64" . $eol;
$header .= "Content-Disposition: attachment" . $eol;
$header .= $content . $eol;
$header .= "--" . $separator . "--";

mail($to,$title,$txt,$header); 
}
?>
