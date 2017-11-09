<?php
$dbhost = "localhost";
$dbuser = "satnetco_dbtuts";
$dbpass = "Q%rHT=I7l%Gr";
$dbname = "satnetco_dbtuts";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');
?>