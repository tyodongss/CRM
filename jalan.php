<?php
include "excel_reader2.php";
include "koneksi.php";

// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
// dan baca dengan PHP Excel Class
$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
$hasildata = $data->rowcount($sheet_index=0);
// default nilai 
$sukses = 0;
$gagal = 0;

for ($i=2; $i<=$hasildata; $i++)
{
  $data1 = $data->val($i,2); 
  $data2 = $data->val($i,3);
  $data3 = $data->val($i,4);
  $data4 = $data->val($i,5);
  $data5 = $data->val($i,6);
  $data6 = $data->val($i,7);
  $data7 = $data->val($i,8);
  $data8 = $data->val($i,9);
  $data9 = $data->val($i,10);
  $data10 = $data->val($i,11);
  $data11 = $data->val($i,12);
  $data12 = $data->val($i,13);
  $data13 = $data->val($i,14);

$query = "INSERT INTO items VALUES ('$data1','$data2', '$data3', '$data4', '$data5', '$data6', '$data7', '$data8', '$data9', '$data10', '$data11', '$data12', '$data13')";
$hasil = mysql_query($query);

if ($hasildata) $sukses++;
else $gagal++;
  
echo "<pre>";
print_r($query);
echo "</pre>";

}
echo "<b>import data selesai.</b> <br>";
echo "Data yang berhasil di import : " . $sukses .  "<br>";
echo "Data yang gagal diimport : ".$gagal .  "<br>";
echo "back <a href='import.php'>import</a>";
?>
