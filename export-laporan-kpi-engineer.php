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
            $sql = "SELECT engineer.nama_engineer, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Installation' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_instalasi, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Troubleshooting' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_troubleshooting, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Survey' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_survey, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Moving' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_moving, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Misc Job' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_miscjob, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Trip' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_trip, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Rest' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_rest, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Duty' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_duty, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle Site' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idlesite, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idle, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Leave' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_leave, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Day Off' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_dayoff, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Sick' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_sick 
              FROM daily_activity
              INNER JOIN engineer ON daily_activity.id_engineer = engineer.id_engineer 
              WHERE datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' group by nama_engineer";
            
            } else if ($nama_engineer=="$nama_engineer"){
 
            $sql = "SELECT engineer.nama_engineer, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Installation' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_instalasi, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Troubleshooting' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_troubleshooting, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Survey' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_survey, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Moving' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_moving, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Misc Job' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_miscjob, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Trip' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_trip, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Rest' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_rest, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Duty' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_duty, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle Site' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idlesite, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idle, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Leave' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_leave, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Day Off' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_dayoff, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Sick' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_sick 
              FROM daily_activity
              INNER JOIN engineer ON daily_activity.id_engineer = engineer.id_engineer 
              WHERE nama_engineer='$nama_engineer'
              AND datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' group by nama_engineer";
                                

            } else {
             $sql = "SELECT engineer.nama_engineer, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Installation' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_instalasi, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Troubleshooting' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_troubleshooting, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Survey' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_survey, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Moving' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_moving, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Misc Job' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_miscjob, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Trip' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_trip, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Rest' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_rest, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Duty' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_duty, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle Site' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idlesite, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idle, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Leave' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_leave, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Day Off' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_dayoff, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Sick' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_sick 
              FROM daily_activity
              INNER JOIN engineer ON daily_activity.id_engineer = engineer.id_engineer 
              WHERE nama_engineer='$nama_engineer'
              AND datetime_start='$tgl'
              AND job_to_do2.id_job_to_do =  '$id'";
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
