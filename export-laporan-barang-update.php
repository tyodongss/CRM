<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "barang"; // MySQL Table Name
$xls_filename = 'laporan-barang-update'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
      $tgl_awal =$_POST['tgl_awal'];
      $tgl_akhir = $_POST['tgl_akhir'];
      $keterangan = $_POST['keterangan'];

/*** CHECK FUNCTION ***/

    if ($keterangan=="$keterangan"){
      $sql = "SELECT item.nama_item, item.code_item, barang.serial_number, barang_update.swos, barang_update.keterangan, barang_update.tgl_barang_update, customer.nama, bts.nama_bts, engineer.nama_engineer, vendor.nama_vendor, barang_update.status_rma
              FROM barang_update, barang, item, customer, bts, engineer, vendor
              WHERE barang_update.id_barang = barang.id_barang
              AND barang.code_item = item.code_item
              AND barang_update.id_customer = customer.id_customer
              AND barang_update.id_bts = bts.id_bts
              AND barang_update.id_engineer = engineer.id_engineer
              AND barang_update.id_vendor = vendor.id_vendor
              AND keterangan = '$keterangan'
              AND tgl_barang_update BETWEEN '$tgl_awal' AND '$tgl_akhir'
              ORDER BY item.nama_item ASC "; 
      
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
