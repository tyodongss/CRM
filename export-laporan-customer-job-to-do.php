<?php
/***** EDIT BELOW LINES *****/
$DB_Server = "localhost"; // MySQL Server
$DB_Username = "satnetco_user"; // MySQL Username
$DB_Password = "D=;Z(6#]Sreu"; // MySQL Password
$DB_DBName = "satnetco_noc"; // MySQL Database Name
$DB_TBLName = "job-to-do2"; // MySQL Table Name
$xls_filename = 'laporan-customer-job-to-do'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name

$tgl_awal =$_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$nama = $_POST['nama'];

/*** CHECK FUNCTION ***/

if ($nama=="All"){
            $sql = "SELECT job_to_do2.swos, owner.nama_owner, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, job_to_do2.datetime_open, job_to_do2.datetime_finish, timediff(job_to_do2.datetime_finish, job_to_do2.datetime_open) as duration, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.remark
              FROM job_to_do2
              JOIN customer ON job_to_do2.id_customer = customer.id_customer
              JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
              JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan
              JOIN owner ON job_to_do2.id_owner = owner.id_owner
              AND datetime_open
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir'
              ORDER BY job_to_do2.id_job_to_do DESC";

}else if ($nama=="$nama"){
            $sql = "SELECT job_to_do2.swos, owner.nama_owner, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, job_to_do2.datetime_open, job_to_do2.datetime_finish, timediff(job_to_do2.datetime_finish, job_to_do2.datetime_open) as duration, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.remark
              FROM job_to_do2
              JOIN customer ON job_to_do2.id_customer = customer.id_customer
              JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
              JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan
              JOIN owner ON job_to_do2.id_owner = owner.id_owner
              AND nama = '$nama'
              AND datetime_open
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir'
              ORDER BY job_to_do2.id_job_to_do DESC";

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
