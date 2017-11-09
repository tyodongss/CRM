<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "customer_complain"; // MySQL Table Name
$xls_filename = 'laporan-sla-customer-complain'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$tgl_awal =$_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$id_customer = $_POST['id_customer'];

/*** CHECK FUNCTION ***/

        if ($nama="null"){

        $sql = "select customer_complain.swos, customer.nama, customer_complain.status_charge, customer_complain.nama_cust_complain, customer_complain.complain_via, customer_complain.priority_complain, customer_complain.datetime_start, customer_complain.datetime_end, customer_complain.root_cause, customer_complain.solved_after, customer_complain.status_cust_complain FROM customer_complain,customer where customer_complain.id_customer=customer.id_customer and datetime_start between '$tgl_awal' and '$tgl_akhir' order by customer_complain.id_customer_complain asc";

        } else {

        $sql = "select customer_complain.swos, customer.nama, customer_complain.status_charge, customer_complain.nama_cust_complain, customer_complain.complain_via, customer_complain.priority_complain, customer_complain.datetime_start, customer_complain.datetime_end, customer_complain.root_cause, customer_complain.solved_after, customer_complain.status_cust_complain FROM customer_complain,customer where customer_complain.id_customer=customer.id_customer and customer_complain.id_customer='$nama' and datetime_start between '$tgl_awal' and '$tgl_akhir' order by customer_complain.id_customer_complain asc";

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
