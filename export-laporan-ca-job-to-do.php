<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "ca_request"; // MySQL Table Name
$xls_filename = 'laporan-ca-job-to-do'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 

/*** CHECK FUNCTION ***/

    $id_job_to_do = $_POST['id_job_to_do'];

			  if ($id_job_to_do=="id_job_to_do"){
                $sql = "SELECT ca_request.swos, ca_budget.judul_ca_budget, paa.nama_paa, ca_request.tgl_request, ca_request.tgl_approve, job_to_do2.nama_job_to_do, ca_request.judul_ca, ca_request.keterangan, ca_request.jumlah, engineer.nama_engineer, ca_request.status_approval, ca_request.status_ca_request
					FROM ca_request, ca_budget, paa, engineer, job_to_do2
					WHERE id_job_to_do =  '$id_job_to_do'
					AND ca_request.id_ca_budget = ca_budget.id_ca_budget
					AND ca_request.id_paa = paa.id_paa
					AND ca_request.id_engineer = engineer.id_engineer
					AND ca_request.id_job_to_do = job_to_do2.id_job_to_do
                  ORDER BY id_ca_request DESC";

              }else {
				  
				 $sql = "SELECT ca_request.swos, ca_budget.judul_ca_budget, paa.nama_paa, ca_request.tgl_request, ca_request.tgl_approve, job_to_do2.nama_job_to_do, ca_request.judul_ca, ca_request.keterangan, ca_request.jumlah, engineer.nama_engineer, ca_request.status_approval, ca_request.status_ca_request
					FROM ca_request, ca_budget, paa, engineer, job_to_do2
					WHERE ca_request.id_ca_budget = ca_budget.id_ca_budget
					AND ca_request.id_paa = paa.id_paa
					AND ca_request.id_engineer = engineer.id_engineer
					AND ca_request.id_job_to_do = job_to_do2.id_job_to_do
                  ORDER BY id_ca_request DESC";
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
