<?php 
## untuk logout ##
if ($_GET['session']=="close"){
# Logging
include "proses-log.php";

	session_start();
	unset ($_SESSION);
	session_unset();
	session_destroy();
	header("Location: index.php?err=logout");

## untuk login ##
} else {
session_start();
include ('koneksi.php');

#DATA
$username = $_POST['username'];
$password = $_POST['password'];

#QUERY
$sql = mysql_query("select * from engineer where username='$username'");
$row = mysql_fetch_assoc($sql);
$count = mysql_fetch_row($sql);

# JIKA ROW = 1
if ($count=1){
		## jika username_form tidak sama username_db ##
		if ($row['username']!=$username){
			header("Location: index.php?err=uname");

		## jika password_form tidak sama password_db ##
		} elseif ($row['password']!=$password){
			header("Location: index.php?err=pass");

		## jika username_form,password_form = username_db,password_db ##
		} elseif ($row['username']==$username && $row['password']==$password){
			## jika status_db = active ##
			if ($row['status']=="active"){
				$_SESSION['name_engineer'] = $row['name_engineer'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['id'] = $row['id_engineer'];
				$_SESSION['email_engineer'] = $row['email_engineer'];
				header("Location: dashboard.php");
# Logging
include "proses-log.php";


			## jika status_db selain active ##
			} else {
				header("Location: index.php?err=disabled");
			}

		## SESSION ERROR ##
		} else {
			print "SESSION ERROR";
		}

## DATA INVALID ##
} else {
	print "DATA INVALID";
	header("Location: index.php?err=unknown");
}

}
?>
				
