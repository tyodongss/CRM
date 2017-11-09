<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "ca_report"; // MySQL Table Name
$xls_filename = 'laporan-ca-report'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 

/*** CHECK FUNCTION ***/

    $judul_ca = $_POST['judul_ca'];

			  if ($judul_ca=="judul_ca"){                
				
				 $sql = "SELECT ca_request.judul_ca, engineer.nama_engineer, ca_kategori.nama_ca_kategori, ca_report.tgl_report, ca_report.jumlah, ca_report.keterangan, ca_report.note_asli, ca_report.status_ca_report
					FROM ca_report, engineer, ca_kategori, ca_request
					WHERE judul_ca = '$judul_ca'
					AND ca_report.id_engineer = engineer.id_engineer
					AND ca_report.id_ca_kategori = ca_kategori.id_ca_kategori
					AND ca_report.id_ca_request = ca_request.id_ca_request
					ORDER BY id_ca_report DESC";

              }else {
				  
				 $sql = "SELECT ca_request.judul_ca, engineer.nama_engineer, ca_kategori.nama_ca_kategori, ca_report.tgl_report, ca_report.jumlah, ca_report.keterangan, ca_report.note_asli, ca_report.status_ca_report
					FROM ca_report, engineer, ca_kategori, ca_request
					WHERE ca_report.id_engineer = engineer.id_engineer
					AND ca_report.id_ca_kategori = ca_kategori.id_ca_kategori
					AND ca_report.id_ca_request = ca_request.id_ca_request
					ORDER BY id_ca_report DESC";
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
