<?php
#Logging
include "proses-log.php";

include "koneksi.php";
$name_model=$_POST['name_model'];


$a=mysql_query("insert into model(name_model) value ('$name_model')");

if($a){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-model.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}

?>
