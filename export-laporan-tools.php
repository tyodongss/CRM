<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "tools"; // MySQL Table Name
$xls_filename = 'laporan-tools'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 

/*** CHECK FUNCTION ***/

       $id_tools = $_POST['id_tools'];
            
                if ($id_tools=="All"){
                $sql = "SELECT tools.code_item, item.nama_item, kategori_item.nama_kategori_item, tools.id_owner, owner.nama_owner, tools.id_lokasi, lokasi.nama_lokasi, tools.serial_number, tools.id_vendor, vendor.nama_vendor, tools.kondisi, tools.po_number, tools.tgl_masuk, tools.status_tools, tools.nilai_perolehan, tools.umur, tools.remark
          FROM tools, item, owner, lokasi, vendor,kategori_item
          WHERE tools.code_item = item.code_item
          AND tools.id_kategori_item = kategori_item.id_kategori_item
          AND tools.id_owner = owner.id_owner
          AND tools.id_lokasi = lokasi.id_lokasi
          AND tools.id_vendor = vendor.id_vendor
          ORDER BY nama_item ASC";
          

                }else if($id_tools=="$id_tools"){
          
         $sql = "SELECT tools.code_item, item.nama_item, kategori_item.nama_kategori_item, tools.id_owner, owner.nama_owner, tools.id_lokasi, lokasi.nama_lokasi, tools.serial_number, tools.id_vendor, vendor.nama_vendor, tools.kondisi, tools.po_number, tools.tgl_masuk, tools.status_tools, tools.nilai_perolehan, tools.umur, tools.remark
                    FROM tools, item, owner, lokasi, vendor,kategori_item
                    WHERE id_tools = '$id_tools'
          AND tools.code_item = item.code_item
                    AND tools.id_kategori_item = kategori_item.id_kategori_item
                    AND tools.id_owner = owner.id_owner
                    AND tools.id_lokasi = lokasi.id_lokasi
                    AND tools.id_vendor = vendor.id_vendor
                    ORDER BY nama_item ASC";
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
