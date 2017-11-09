<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "daily_activity"; // MySQL Table Name
$xls_filename = 'laporan-daily_activity'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$tgl_awal =$_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$nama_engineer = $_POST['nama_engineer'];

/*** CHECK FUNCTION ***/

if ($nama_engineer=="All"){
            $sql = "SELECT daily_activity.id_daily_activity, daily_activity.swos, engineer.nama_engineer, daily_activity.tipe_pekerjaan, daily_activity.activity, customer.nama, daily_activity.datetime_start, daily_activity.datetime_finish, daily_activity.ot, daily_activity.rb, daily_activity.trip_allowance, daily_activity.remark
			  FROM daily_activity, engineer, customer
              WHERE engineer.id_engineer = daily_activity.id_engineer
              AND customer.id_customer = daily_activity.id_customer
              AND datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by id_daily_activity desc";
            
            } else if ($nama_engineer=="$nama_engineer"){
 
            $sql = "SELECT daily_activity.id_daily_activity, daily_activity.swos, engineer.nama_engineer, daily_activity.tipe_pekerjaan, daily_activity.activity, customer.nama, daily_activity.datetime_start, daily_activity.datetime_finish, daily_activity.ot, daily_activity.rb, daily_activity.trip_allowance, daily_activity.remark
			  FROM daily_activity, engineer, customer
              WHERE engineer.id_engineer = daily_activity.id_engineer
              AND customer.id_customer = daily_activity.id_customer
			  AND nama_engineer =  '$nama_engineer'
              AND datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by id_daily_activity desc";
                                

            } else {
             $sql = "SELECT daily_activity.id_daily_activity, daily_activity.swos, engineer.nama_engineer, daily_activity.tipe_pekerjaan, daily_activity.activity, customer.nama, daily_activity.datetime_start, daily_activity.datetime_finish,  daily_activity.ot, daily_activity.rb, daily_activity.trip_allowance, daily_activity.remark
			  FROM daily_activity, engineer, customer
              WHERE engineer.id_engineer = daily_activity.id_engineer
              AND customer.id_customer = daily_activity.id_customer
			  AND nama_engineer =  '$nama_engineer'
              AND datetime_start
              = '$tgl'  order by id_daily_activity desc";
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
