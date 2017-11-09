<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "bts_problem"; // MySQL Table Name
$xls_filename = 'laporan-sla-bts'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$tgl_awal =$_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$nama_bts = $_POST['nama_bts'];

/*** CHECK FUNCTION ***/

if ($nama_bts=="All"){
            $sql = "SELECT bts_problem.swos, device_bts.nama_device, bts.nama_bts, engineer.nama_engineer, bts_problem.description, bts_problem.datetime_start, bts_problem.datetime_end, bts_problem.root_cause, bts_problem.solved_after, bts_problem.status_bts_problem FROM bts_problem, device_bts, bts, engineer WHERE device_bts.id_device_bts = bts_problem.id_device_bts AND bts.id_bts = bts_problem.id_bts AND engineer.id_engineer = bts_problem.id_engineer AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' ORDER BY id_bts_problem DESC"; 
            
            } else if($nama_bts=="$nama_bts") {
            $sql = "SELECT bts_problem.swos, device_bts.nama_device, bts.nama_bts, engineer.nama_engineer, bts_problem.description, bts_problem.datetime_start, bts_problem.datetime_end, bts_problem.root_cause, bts_problem.solved_after, bts_problem.status_bts_problem FROM bts_problem, device_bts, bts, engineer WHERE device_bts.id_device_bts = bts_problem.id_device_bts AND bts.id_bts = bts_problem.id_bts AND engineer.id_engineer = bts_problem.id_engineer AND nama_bts='$nama_bts' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' ORDER BY id_bts_problem DESC";
            } else {
            $sql = "SELECT bts_problem.id_bts_problem, bts_problem.swos, device_bts.nama_device, bts.nama_bts, engineer.nama_engineer, bts_problem.description, bts_problem.datetime_start, bts_problem.datetime_end, bts_problem.root_cause, bts_problem.solved_after, bts_problem.status_bts_problem FROM bts_problem, device_bts, bts, engineer WHERE device_bts.id_device_bts = bts_problem.id_device_bts AND bts.id_bts = bts_problem.id_bts AND engineer.id_engineer = bts_problem.id_engineer AND nama_bts='$nama_bts' AND datetime_start BETWEEN='$tgl' ORDER BY id_bts_problem DESC";
            }
/*
if ($tgl==""){
      $query = "SELECT SUM(harga) as Total FROM barang WHERE status_barang = 'tersedia' AND tgl_masuk BETWEEN  '$tgl_awal' AND  '$tgl_akhir'"; 
      }
*/

/***** DO NOT EDIT BELOW LINES *****/
// Create MySQL connection
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Failed to connect to MySQL:<br />" . mysql_error() . "<br />" . mysql_errno());
// Select database
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Failed to select database:<br />" . mysql_error(). "<br />" . mysql_errno());
// Execute query
$result = @mysql_query($sql,$Connect) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());
 
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = "\t"; // tabbed character
 
// Start of printing column names as names of MySQL fields
for ($i = 0; $i<mysql_num_fields($result); $i++) {
  echo mysql_field_name($result, $i) . "\t";
}
print("\n");
// End of printing column names
 
// Start while loop to get data
while($row = mysql_fetch_row($result))
{
  $schema_insert = "";
  for($j=0; $j<mysql_num_fields($result); $j++)
  {
    if(!isset($row[$j])) {
      $schema_insert .= "NULL".$sep;
    }
    elseif ($row[$j] != "") {
      $schema_insert .= "$row[$j]".$sep;
    }
    else {
      $schema_insert .= "".$sep;
    }
  }
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
}
?>
