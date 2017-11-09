<?php 
session_start();
if ($_GET['menu']=="role"){ 
?>
	<form action="?menu=login" method="POST">
	<label>Pilih Role</label>
	<select name="role" required>
	<option></option>
	<option value="managertechnicalservices">Manager Technical Services</option>
	<option value="assistantmanagertechnicalservices">Assistant Manager Technical Services</option>
	<option value="supervisornoc">Supervisor NOC</option>
	<option value="noc">NOC</option>
	<option value="supervisorengineering">Supervisor Engineering</option>
	<option value="engineer">Engineer</option>
	<option value="supervisorvsat">Supervisor VSAT</option>
	<option value="engineervsat">Engineer VSAT</option>
	<option value="supervisortechnicalsupport">Supervisor Technical Support</option>
	<option value="technicalsupport">Technical Support</option>
	<option value="supervisortechnicalsupportjkt">Supervisor Technical Support JKT</option>
	<option value="technicalsupportjkt">Technical Support JKT</option>
	<option value="helpdesk">Helpdesk</option>
	<option value="managerhrdga">Manager HRD & GA</option>
	<option value="ga">GA</option>
	<option value="hrd">HRD</option>
	<option value="managerfinanceaccounting">Manager Finance & Accounting</option>
	<option value="accounting">Accounting</option>
	<option value="warehouse">Warehouse</option>
	<option value="paa">PAA</option>
	<option value="sales">Sales</option>
	</select>
	<input type="submit" value="Start Developer Session">
	</form>

<?php 
} else if ($_GET['menu']=="login"){ 
	include "proses-log.php";
	if ($_SESSION['role']!=""){
		session_start();
		$_SESSION['roleold'] = $_SESSION['role'];
		$_SESSION['role'] = $_POST['role'];
		$_SESSION['devel'] = "on";
		header ("Location: dashboard.php?menu=devel");
	} else {
		header ("Location: dashboard.php");
	}
} else if ($_GET['menu']=="logout"){
	include "proses-log.php";
	$_SESSION['role'] = $_SESSION['roleold'];
	$_SESSION['devel'] = "off";
	header ("Location: dashboard.php");
} else {
	print "invalid menu";
}
?>
