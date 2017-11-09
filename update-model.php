<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$name_model=$_POST['name_model']; 


$query ="update model set name_model='$name_model' where id_model='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-model.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}
?>
