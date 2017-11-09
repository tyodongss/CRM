<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "domain"; // MySQL Table Name
$xls_filename = 'laporan-domain'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
 
$tgl=$_POST['date']; 
$tgl_awal =$_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$status_domain = $_POST['status_domain'];

/*** CHECK FUNCTION ***/

if ($status_domain=="All"){
 
           $sql = "select domain.nama_domain, customer.nama,registrar.nama_registrar, domain.date_expire, domain.domainhosting, domain.webhosting, domain.webhosting_usage, domain.mailhosting, domain.mailhosting_usage, domain.status_domain, domain.nama_kontak, domain.hp_kontak, domain.email_kontak, domain.remark from domain,customer,registrar where customer.id_customer=domain.id_customer and registrar.id_registrar=domain.id_registrar            
              AND domain.date_expire			 
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by nama_domain asc";

            } else if ($status_domain=="$status_domain"){
 
            $sql = "select domain.nama_domain, customer.nama, registrar.nama_registrar, domain.date_expire, domain.domainhosting, domain.webhosting, domain.webhosting_usage, domain.mailhosting, domain.mailhosting_usage, domain.status_domain, domain.nama_kontak, domain.hp_kontak, domain.email_kontak, domain.remark from domain,customer,registrar where customer.id_customer=domain.id_customer and registrar.id_registrar=domain.id_registrar
              AND status_domain =  '$status_domain'
              AND domain.date_expire
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by nama_domain asc";

            } else {
            $sql = "select domain.nama_domain, customer.nama, registrar.nama_registrar, domain.date_expire, domain.domainhosting, domain.webhosting, domain.webhosting_usage, domain.mailhosting, domain.mailhosting_usage, domain.status_domain, domain.nama_kontak, domain.hp_kontak, domain.email_kontak, domain.remark from domain,customer,registrar where customer.id_customer=domain.id_customer and registrar.id_registrar=domain.id_registrar
              AND status_domain =  '$status_domain'
              AND date_expire
              = '$tgl' order by nama_domain asc";

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
