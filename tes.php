<?
//mail("latifa@satnetcom.com", "Selamat Datang", "Halo admin \n Terima kasih \n atas respon anda");

mail('latifa@satnetcom.com', 'Judul Email', 
'<html><body><p>Tes Tes Email</p></body></html>', 
"To: <latifa@satnetcom.com>\n" . 
"From: <latifaa.latifaaa@gmail.com>\n" . 
"MIME-Version: 1.0\n" . 
"Content-type: text/html; charset=iso-8859-1"); 
?>