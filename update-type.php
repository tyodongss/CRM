<?php 
# Logging
include "proses-log.php";

include "koneksi.php";
$id = $_POST['id']; 
$name_type=$_POST['name_type']; 


$query ="update type set name_type='$name_type' where id_type='$id'"; 
$hasil = mysql_query($query);

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-type.php\">";
}else{
  echo "Failed to input data"; 
  echo mysql_error(); 
}
?>
