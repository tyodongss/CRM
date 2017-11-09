<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "snet_user"; // MySQL Username
$DB_Password = "patyaXY5QhdAz7QC"; // MySQL Password
$DB_DBName = "snet_db"; // MySQL Database Name
$DB_TBLName = "daily_activity"; // MySQL Table Name
$xls_filename = 'item-report-'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$status = $_POST['status'];

/*** CHECK FUNCTION ***/

if ($status=="All"){
 
            $sql = "SELECT items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer					
					ORDER BY name_type ASC";		

            } else if ($status=="$status"){
 
            $sql = "SELECT items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer
					AND items.status = '$status'
					ORDER BY name_type ASC";			

            } else {
            $sql = "items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer
					AND items.status = '$status'
					AND items.date_purchase = '$tgl' 
					ORDER BY name_type ASC";	

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
