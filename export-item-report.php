<?php
/*******************************************
    Export Excel dengan PHPExcel
 
    Dibuat oleh : Danni Moring
    pemrograman : PHP
******************************************/

include "config.php";
include "PHPExcel.php";

date_default_timezone_set("Asia/Makassar");

$excelku = new PHPExcel();
$dateTimeNow = time(); 

// Set properties
$excelku->getProperties()->setCreator("Prasetyo Ikwan Kurniawan")
                         ->setLastModifiedBy("Prasetyo Ikwan Kurniawan");

// Set lebar kolom
$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$excelku->getActiveSheet()->getColumnDimension('D')->setWidth(27);
$excelku->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$excelku->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$excelku->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$excelku->getActiveSheet()->getColumnDimension('J')->setWidth(25);

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('A1:J1');
$excelku->getActiveSheet()->mergeCells('A2:J2');

// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
$SI->setCellValue('A1', 'ITEM REPORT'); //Judul laporan
$SI->setCellValue('A3', 'NO'); //Kolom No
$SI->setCellValue('B3', 'SERIAL NUMBER'); //Kolom SN
$SI->setCellValue('C3', 'TYPE NAME'); //Kolom Type
$SI->setCellValue('D3', 'MODEL NAME'); //Kolom Model
$SI->setCellValue('E3', 'PURCHASED FROM'); //Kolom Purchased from
$SI->setCellValue('F3', 'PURCHASE DATE'); //Kolom Purchase Date
$SI->setCellValue('G3', 'CONTRACT'); //Kolom Contract
$SI->setCellValue('H3', 'LOCATION'); //Kolom Location
$SI->setCellValue('I3', 'STATUS'); //Kolom Status
$SI->setCellValue('J3', 'REMARK'); //Kolom Remark

//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'    => PHPExcel_Style_Fill::FILL_SOLID,
		  'color'   => array('argb' => 'FFEEEEEE')),
		  'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
	));
	
$bodyStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
		  'color'	=> array('argb' => 'FFFFFFFF')),
		  'borders' => array(
						'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  )
    ));
	
	

//Menggunakan HeaderStylenya
$excelku->getActiveSheet()->setSharedStyle($headerStylenya, "A3:J3");

// Mengambil data dari tabel

$tgl=$_POST['date']; 
$status = $_POST['status'];

			if ($status=="All"){
 
            $strsql = "SELECT items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer					
					ORDER BY name_type ASC";		

            } else if ($status=="$status"){
 
            $strsql = "SELECT items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer
					AND items.status = '$status'
					ORDER BY name_type ASC";			

            } else {
            $strsql = "items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer
					AND items.status = '$status'
					AND items.date_purchase = '$tgl' 
					ORDER BY name_type ASC";	

            }
$res    = $database->query($strsql);
$baris  = 4; //Ini untuk dimulai baris datanya, karena di baris 3 itu digunakan untuk header tabel
$no     = 1;

while ($row = $res->fetch_assoc()) {
  $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
  $SI->setCellValue("B".$baris,$row['serial_number']); 
  $SI->setCellValue("C".$baris,$row['name_type']); 
  $SI->setCellValue("D".$baris,$row['name_model']); 
  $SI->setCellValue("E".$baris,$row['from_purchase']); 
  $SI->setCellValue("F".$baris,$row['date_purchase']); 
  $SI->setCellValue("G".$baris,$row['contract_condition']); 
  $SI->setCellValue("H".$baris,$row['name_customer']); 
  $SI->setCellValue("I".$baris,$row['status']); 
  $SI->setCellValue("J".$baris,$row['remark']); 
  $baris++; //looping untuk barisnya
}
//Membuat garis di body tabel (isi data)
$excelku->getActiveSheet()->setSharedStyle($bodyStylenya, "A4:J$baris");

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('Item Report');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=item-report.xlsx');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>