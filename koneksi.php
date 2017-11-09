<?php
//koneksi
    $namaserver='localhost';
    $userdb='snet_user';
    $passdb='patyaXY5QhdAz7QC';
    $namadb='snet_db';
  
   $koneksi=mysql_connect($namaserver,$userdb,$passdb);
   mysql_select_db($namadb,$koneksi);

