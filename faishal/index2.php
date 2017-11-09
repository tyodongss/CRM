<html>
<head>
<title>Oprek bro</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Makassar');
include ("koneksi.php");
?>
<form action="report.php" method="POST">
Start <input type="text" name="start" value="<?php print date('Y-m-d H:i').":00" ?>"><br>
Finish <input type="text" name="finish" value="<?php print date('Y-m-d H:i').":00" ?>"><br>
Circuit 
<select name="circuit" required>
	<option></option>
	<option value="ALL">ALL</option>
	<?php
	$query = mysql_query("select * from circuit");
	while($data=mysql_fetch_assoc($query)){
	?>
	<option value="<?php print $data['nama_circuit']?>"><?php print $data['nama_circuit']?></option>
	<?php } ?>
</select><br>

<input type="submit" value="GO">
</form>
</body>
</html>
