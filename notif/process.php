<?php
session_start();
include "../koneksi.php";

if ($_POST['menu']=="notiflink"){
$sender = $_POST['sender'];
$mailcc = $_POST['emailcc'];
$mailbcc = $_POST['emailbcc'];

$desc = $_POST['description'];
$start = $_POST['start'];
$status = $_POST['status'];
$cat = $_POST['category'];
$createby = $_POST['createby'];
$coverage = $_POST['coverage'];

$quer = mysql_query("insert into notification (createby, description, start, category, coverage, publishdate) value ('$createby', '$desc', '$start', '$cat', '$coverage', now())");

if ($quer){
	print "sukses<br>";
	echo "<meta http-equiv=\"refresh\" content=\"1;../show-notification.php\">";
	$body = '
		<font face="Arial" size=2>
		<b><i><u>Dear Valued Customers and Partners</b></i></u>
		<br><br>
		Thank you for using SatNetCom Services.<br>
		We would like to inform you that we have a problem with our network and for the problem impact to your services.<br>
		The problem is describe as below:<br><br>
		<table align="left" border=0 width="100%">
		<tr>
		        <td>Problem Description</td>
		        <td>:<b> ' .$desc. '</b></td>
		</tr>
		<tr>
		        <td>Date/Time Start</td>
		        <td>: ' .$start. ' (GMT+8)</td>
		</tr>
		<tr>
		        <td>Impact Coverage Area/Services</td>
		        <td>: ' .$coverage. '</td>
		</tr>
		<tr>
		        <td>Status</td>
		        <td>: ' . $status . '</td>
		</tr>
		</table>
		<br><br>
	
		We will update you as soon as possible for any finding regarding this issue. We are sorry for inconvenience caused.<br>
		If you need more help and/or assistance, please don\'t hesitate to contact us by phone at +62 542 - 875570 and/or email us at helpdesk@satnetcom.com.<br>
		Thank you for your attention and cooperation.
		<br><br>
		Regards,<br>
		<font color="blue"><b>' .$createby. '</b></font><br>
		Technical Services Dept.
		<br>
		<br>
		
		<i>This email was generate by our system,<br>
		Please visit <a href="http://noc-info.satnetcom.com">Our homepage</a> for more information.<br>
		</i>
		</font>
		';

	$subject = "[SatNetCom]" . "\r" . $cat;
	$header = "Bcc: $mailbcc \r\n" . "From : $sender <$sender>\r\n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=iso-8859-1 \r\n" . "Cc: $mailcc \r\n";
	if (mail('faishal.rizkika@satnetcom.com',$subject,$body,$header)){
		print "email notif sent<br>";
	} else {
		print "email not sent<br>";
	}
} else {
	print "error<br>";
	print mysql_error();
}



} else {
	print "Invalid process";
}

?>
