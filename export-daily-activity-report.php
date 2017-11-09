<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "snet_user"; // MySQL Username
$DB_Password = "patyaXY5QhdAz7QC"; // MySQL Password
$DB_DBName = "snet_db"; // MySQL Database Name
$DB_TBLName = "daily_activity"; // MySQL Table Name
$xls_filename = 'daily-activity-report-'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$time1 =$_POST['time1'];
$time2 = $_POST['time2'];
$name_engineer = $_POST['name_engineer'];

/*** CHECK FUNCTION ***/

if ($name_engineer=="All"){
 
            $sql = "SELECT daily_activity.id_daily_activity, engineer.name_engineer, support_parts.name_support_parts, daily_activity.activity, customer.name_customer, daily_activity.start_time, daily_activity.end_time, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at
					FROM daily_activity, engineer, support_parts, customer
					WHERE daily_activity.id_engineer=engineer.id_engineer
					AND daily_activity.id_support_parts=support_parts.id_support_parts
					AND daily_activity.id_customer=customer.id_customer
					AND start_time
					BETWEEN  '$time1' AND '$time2' 
					ORDER BY id_daily_activity DESC";		

            } else if ($name_engineer=="$name_engineer"){
 
            $sql = "SELECT daily_activity.id_daily_activity, engineer.name_engineer, support_parts.name_support_parts, daily_activity.activity, customer.name_customer, daily_activity.start_time, daily_activity.end_time, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at
					FROM daily_activity, engineer, support_parts, customer
					WHERE daily_activity.id_engineer=engineer.id_engineer
					AND daily_activity.id_support_parts=support_parts.id_support_parts
					AND daily_activity.id_customer=customer.id_customer
					AND name_engineer =  '$name_engineer'
					AND start_time
					BETWEEN  '$time1' AND '$time2' 
					ORDER BY id_daily_activity DESC";			

            } else {
            $sql = "SELECT daily_activity.id_daily_activity, engineer.name_engineer, support_parts.name_support_parts, daily_activity.activity, customer.name_customer, daily_activity.start_time, daily_activity.end_time, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at
					FROM daily_activity, engineer, support_parts, customer
					WHERE daily_activity.id_engineer=engineer.id_engineer
					AND daily_activity.id_support_parts=support_parts.id_support_parts
					AND daily_activity.id_customer=customer.id_customer
					AND name_engineer =  '$name_engineer'
					AND start_time = '$tgl' 
					ORDER BY id_daily_activity DESC";	

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
