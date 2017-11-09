<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "backbone_problem"; // MySQL Table Name
$xls_filename = 'laporan-backbone-problem'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$tgl_awal =$_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$nama_circuit = $_POST['nama_circuit'];

/*** CHECK FUNCTION ***/

if ($nama_circuit=="All"){
 
            $sql = "SELECT backbone_problem.swos, circuit.nama_circuit, backbone.nama_backbone,  backbone_problem.description, backbone_problem.datetime_start, backbone_problem.datetime_end, timediff(datetime_end,datetime_start) as duration, backbone_problem.root_cause, backbone_problem.solved_after, backbone_problem.status_backbone_problem
              FROM backbone_problem, circuit, backbone
              WHERE backbone_problem.id_circuit = circuit.id_circuit
              AND backbone_problem.id_backbone = backbone.id_backbone              
              AND datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by circuit.nama_circuit asc";

            } else if ($nama_circuit=="$nama_circuit"){
 
            $sql = "SELECT backbone_problem.swos, circuit.nama_circuit, backbone.nama_backbone,  backbone_problem.description, backbone_problem.datetime_start, backbone_problem.datetime_end, timediff(datetime_end,datetime_start) as duration, backbone_problem.root_cause, backbone_problem.solved_after, backbone_problem.status_backbone_problem
              FROM backbone_problem, circuit, backbone
              WHERE backbone_problem.id_circuit = circuit.id_circuit
              AND backbone_problem.id_backbone = backbone.id_backbone
              AND nama_circuit =  '$nama_circuit'
              AND datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by circuit.nama_circuit asc";

            } else {
            $sql = "SELECT backbone_problem.swos, circuit.nama_circuit, backbone.nama_backbone,  backbone_problem.description, backbone_problem.datetime_start, backbone_problem.datetime_end, timediff(datetime_end,datetime_start) as duration, backbone_problem.root_cause, backbone_problem.solved_after, backbone_problem.status_backbone_problems
              FROM backbone_problem, circuit, backbone
              WHERE backbone_problem.id_circuit = circuit.id_circuit
              AND backbone_problem.id_backbone = backbone.id_backbone
              AND nama_circuit =  '$nama_circuit'
              AND datetime_start
              = '$tgl' order by circuit.nama_circuit asc";

            }


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
