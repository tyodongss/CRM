<html>
<head>
<title>Logging in</title>
<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<meta name="description" content="Database BTS SatNetCom Balikpapan, PT" />
<meta name="author" content="tyodongss" />
<link rel="stylesheet" type="text/css" href="css/demo3.css" />
</head>
<body>
<?php 
session_start();
if ($_SESSION['level'] == "noc"){    
echo "<meta http-equiv=\"refresh\" content=\"1;dashboard-noc.php\">";}

elseif ($_SESSION['level'] == "warehouse"){    
echo "<meta http-equiv=\"refresh\" content=\"1;dashboard-warehouse.php\">";
}
elseif ($_SESSION['level'] == "support"){    
echo "<meta http-equiv=\"refresh\" content=\"1;dashboard-support.php\">";
}
?>
</body>
</html>