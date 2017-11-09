<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "customer"; // MySQL Table Name
$xls_filename = 'laporan-aktivasi-customer'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$tgl_awal =$_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];

/*** CHECK FUNCTION ***/

            if ($tgl==""){
            $sql = "SELECT customer.id_customer, customer.nama, customer.alamat, customer.no_telp, customer.contact_person_1, customer.hp_1, customer.email_1, customer.contact_person_2, customer.hp_2, customer.email_2, customer.id_service, service.nama_service, customer.id_bandwidth_down, bandwidth_down.nama_bandwidth_down, customer.id_bandwidth_up, bandwidth_up.nama_bandwidth_up, customer.tanggal_aktivasi, customer.tanggal_terminasi, customer.monthly_fee_idr, customer.monthly_fee_usd, customer.status, customer.remark, customer.created_at, customer.updated_at, customer.deleted_at
                FROM customer, service, bandwidth_down, bandwidth_up
                WHERE customer.id_service = service.id_service
                AND customer.id_bandwidth_down = bandwidth_down.id_bandwidth_down
                AND customer.id_bandwidth_up = bandwidth_up.id_bandwidth_up
                AND tanggal_aktivasi
                BETWEEN  '$tgl_awal'
                AND  '$tgl_akhir'";
            
            } else {
            $sql = "SELECT customer.id_customer, customer.nama, customer.alamat, customer.no_telp, customer.contact_person_1, customer.hp_1, customer.email_1, customer.contact_person_2, customer.hp_2, customer.email_2, customer.id_service, service.nama_service, customer.id_bandwidth_down, bandwidth_down.nama_bandwidth_down, customer.id_bandwidth_up, bandwidth_up.nama_bandwidth_up, customer.tanggal_aktivasi, customer.tanggal_terminasi, customer.monthly_fee_idr, customer.monthly_fee_usd, customer.status, customer.remark, customer.created_at, customer.updated_at, customer.deleted_at
                FROM customer, service, bandwidth_down, bandwidth_up
                WHERE customer.id_service = service.id_service
                AND customer.id_bandwidth_down = bandwidth_down.id_bandwidth_down
                AND customer.id_bandwidth_up = bandwidth_up.id_bandwidth_up
                AND tanggal_aktivasi='$tgl'";
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
