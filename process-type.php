<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$name_type=$_POST['name_type'];


$a=mysql_query("insert into type(name_type) value ('$name_type')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-type.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}

?>
