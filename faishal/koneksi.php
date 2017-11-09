<?php
//koneksi
    $namaserver='localhost';
    $userdb='satnetco_user';
    $passdb='D=;Z(6#]Sreu';
    $namadb='satnetco_noc';
  
   $koneksi=mysql_connect($namaserver,$userdb,$passdb);
   mysql_select_db($namadb,$koneksi);

