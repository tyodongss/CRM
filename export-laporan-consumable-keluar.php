<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "consumable_keluar"; // MySQL Table Name
$xls_filename = 'laporan-consumable-keluar'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$tgl_awal =$_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];

/*** CHECK FUNCTION ***/

if ($tgl==""){
      $sql = "SELECT consumable_keluar.id_consumable_keluar, consumable.nama_consumable, customer.nama,consumable_keluar.bts, consumable_keluar.tgl_keluar, consumable_keluar.jumlah_keluar, engineer.nama_engineer, consumable_keluar.swos
  FROM consumable, consumable_keluar, customer, engineer
  WHERE consumable.id_consumable = consumable_keluar.id_consumable
  AND customer.id_customer = consumable_keluar.id_customer
  AND engineer.id_engineer = consumable_keluar.id_engineer
  AND tgl_masuk
  BETWEEN  '$tgl_awal'
  AND  '$tgl_akhir'
  order by id_consumable_keluar desc"; 
      
      } else {
      $sql = "SELECT consumable_keluar.id_consumable_keluar, consumable.nama_consumable, customer.nama,consumable_keluar.bts, consumable_keluar.tgl_keluar, consumable_keluar.jumlah_keluar, engineer.nama_engineer, consumable_keluar.swos
  FROM consumable, consumable_keluar, customer, engineer
  WHERE consumable.id_consumable = consumable_keluar.id_consumable
  AND customer.id_customer = consumable_keluar.id_customer
  AND engineer.id_engineer = consumable_keluar.id_engineer
  AND tgl_masuk='$tgl' order by id_consumable_keluar desc";
      
      }

if ($tgl==""){          
            $query = ("SELECT consumable_keluar.jumlah_keluar, consumable.nama_consumable, SUM( jumlah_keluar ) AS total_jumlah_stok
FROM consumable_keluar, consumable
WHERE consumable_keluar.created_at IS NOT NULL 
AND consumable.id_consumable = consumable_keluar.id_consumable
AND tgl_masuk
BETWEEN  '$tgl_awal'
AND  '$tgl_akhir'
GROUP BY nama_consumable");
            
            }


/***** DO NOT EDIT BELOW LINES *****/
// Create MySQL connection
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Failed to connect to MySQL:<br />" . mysql_error() . "<br />" . mysql_errno());
// Select database
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Failed to select database:<br />" . mysql_error(). "<br />" . mysql_errno());
// Execute query
$result = @mysql_query($sql,$Connect) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());

$result2 = @mysql_query($query,$Connect) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());
 
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
