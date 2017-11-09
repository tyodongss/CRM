<?php
session_start();
?>
<!--  -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Informasi SNC</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link href="/inventory/css/bootstrap.min.css" rel="stylesheet">
<link href="/inventory/css/datepicker3.css" rel="stylesheet">
<link href="/inventory/css/bootstrap-table.css" rel="stylesheet">
<link href="/inventory/css/styles.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal"></span> SNC-NOC<span></span></a>
<!-- USER MENU -->
<?php include "menu-user.php" ?>

                        </div>

                </div><!-- /.container-fluid -->
        </nav>

  <!--  
  ==================================================== MENU
  -->
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <!--
    <form role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
    </form>
    -->

    <?php include "menu.php"; ?>

    <!--  
  ==================================================== MENU
  -->
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Barang Masuk</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Ubah Barang Masuk</h1>
      </div>
    </div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("SELECT barang.id_barang, barang.code_item, item.nama_item, barang.id_owner, owner.nama_owner, barang.id_lokasi, lokasi.nama_lokasi, barang.mac, barang.serial_number, barang.id_vendor, vendor.nama_vendor, barang.harga, barang.harga_usd, barang.kondisi, barang.po_number, barang.tgl_masuk, barang.status_barang, barang.tgl_qc, barang.id_engineer, engineer.nama_engineer, barang.status_qc, barang.remark
FROM barang, item, owner, lokasi, vendor, engineer
WHERE barang.code_item = item.code_item
AND barang.id_owner = owner.id_owner
AND barang.id_lokasi = lokasi.id_lokasi
AND barang.id_vendor = vendor.id_vendor
AND barang.id_engineer = engineer.id_engineer
AND id_barang =  '$id'"); 
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?>    
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!--<div class="panel-heading">Stok Masuk</div>-->
          <div class="panel-body">
            <div class="col-md-6">
              <form data-toggle="validator" role="form" action="update-barang.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                <input type="hidden" name="id" value="<?php echo $id;?>"/> 

                <div class="form-group">
                  <label>Nama Item</label>
                  <input class="form-control" id="nama_item" value="<?php echo $row['nama_item'];?>">
                </div>

                <div class="form-group">
                  <label>Code Item</label>
                  <input class="form-control" name="code_item" id="code_item" value="<?php echo $row['code_item'];?>">
                </div>
				
                <div class="form-group">
                  <label>Owner</label>
                  <select class="form-control" name="id_owner">
                  <option>---- Pilih Owner ----</option>
                  <option selected value="<?php echo $row['id_owner'];?>"><?php echo $row['nama_owner'];?></option>
                  <?php
                  include "koneksi.php";
                  $sql = mysql_query("SELECT * FROM owner order by nama_owner asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_owner'].'" >'.$data['nama_owner'].'</option>';
                    }
                  }
                  ?>
                </select>
                </div>

                 <div class="form-group">
                  <label>Lokasi</label>
                  <input class="form-control" id="nama_lokasi" value="<?php echo $row['nama_lokasi'];?>">
                </div>

                <div class="form-group">
                  <!--label>Code Item</label-->
                  <input class="form-control" type="hidden" name="id_lokasi" id="id_lokasi" value="<?php echo $row['id_lokasi'];?>">
                </div>
        

                 <div class="form-group">
                  <label>Nama Vendor</label>
                  <select class="form-control" name="id_vendor">
                  <option>---- Pilih Vendor ----</option>
                  <option selected value="<?php echo $row['id_vendor'];?>"><?php echo $row['nama_vendor'];?></option>
                  <?php
                  include "koneksi.php";
                  $sql = mysql_query("SELECT * FROM vendor order by nama_vendor asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_vendor'].'" >'.$data['nama_vendor'].'</option>';
                    }
                  }
                  ?>
                </select>
                </div>
                
                <div class="form-group">
                  <label>MAC Address</label>
                  <input class="form-control" name="mac" value="<?php echo $row['mac'];?>" maxlength="17">
                </div>
                
                <div class="form-group">
                  <label>Serial Number</label>
                  <input class="form-control" name="serial_number" value="<?php echo $row['serial_number'];?>" maxlength="25" required>
                  <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                  <label>Harga IDR</label>
                  <input class="form-control" name="harga" value="<?php echo $row['harga'];?>" maxlength="15" required>
                </div>

                <div class="form-group">
                  <label>Harga USD</label>
                  <input class="form-control" name="harga_usd" value="<?php echo $row['harga_usd'];?>" maxlength="15" required>
                </div>
                
                <div class="form-group">
                  <label>Kondisi</label>
                  <select class = "form-control" name="kondisi"> 
                  <option selected value="<?php echo $row['kondisi'];?>"><?php echo $row['kondisi'];?></option>
                  <option>bagus</option>
                  <option>rusak</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>PO Number</label>
                  <input class="form-control" name="po_number" value="<?php echo $row['po_number'];?>" maxlength="20">
                </div>
                
                <div class="form-group">
                  <label>Tanggal Masuk</label>
                  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_masuk" value="<?php echo $row['tgl_masuk'];?>" required>
                  <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                  <label>Status Barang</label>
                  <input class="form-control" name="status_barang" value="<?php echo $row['status_barang'];?>" maxlength="20" required>
                  <div class="help-block with-errors"></div>
                </div>
				
				        <div class="form-group">
                  <label>Tanggal QC</label>
                  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_qc" value="<?php echo $row['tgl_qc'];?>" >
                </div>
				
			         <div class="form-group">
                  <label>Nama Engineer</label>
                  <select class="form-control" name="id_engineer">
                  <option>---- Pilih Engineer ----</option>
                  <option selected value="<?php echo $row['id_engineer'];?>"><?php echo $row['nama_engineer'];?></option>
                  <?php
                  include "koneksi.php";
                  $sql = mysql_query("SELECT * FROM engineer order by nama_engineer asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_engineer'].'" >'.$data['nama_engineer'].'</option>';
                    }
                  }
                  ?>
                </select>
                </div>
				
				        <div class="form-group">
                  <label>Status QC</label>
                  <select class = "form-control" name="status_qc"> 
                  <option selected value="<?php echo $row['status_qc'];?>"><?php echo $row['status_qc'];?></option>
                  <option>Passed</option>
                  <option>Failed</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Remark</label>
                  <input class="form-control" name="remark" value="<?php echo $row['remark'];?>">
                </div>                
                <button type="submit" class="btn btn-default">Update</button>             
                <a href="../show-barang.php" class="btn btn-default">Back</a>
<?php
}
?>  
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.col-->
    </div><!-- /.row -->
    
  </div><!--/.main-->

  <!--script src="/inventory/inventory/js/jquery-1.11.1.min.js"></script-->
  <script src="/inventory/js/bootstrap.min.js"></script>
  <script src="/inventory/js/chart.min.js"></script>
  <script src="/inventory/js/chart-data.js"></script>
  <script src="/inventory/js/easypiechart.js"></script>
  <script src="/inventory/js/easypiechart-data.js"></script>
  <script src="/inventory/js/bootstrap-datepicker.js"></script>
  <script src="/inventory/js/bootstrap-table.js"></script>
  <script src="/inventory/js/validator.js"></script>
  <script>
    !function ($) {
      $(document).on("click","ul.nav li.parent > a > span.icon", function(){      
        $(this).find('em:first').toggleClass("glyphicon-minus");    
      }); 
      $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
  </script>
  <script>
            $(function() {
                $( "#nama_item" ).autocomplete({
                    source: "namaItem.php",
                    minLength: 2,
                    select: function( event, ui ) {
            $('#code_item').val(ui.item.code_item);
                    }
                });
            });
        </script> 
         <script>
            $(function() {
                $( "#nama_lokasi" ).autocomplete({
                    source: "namaLokasi.php",
                    minLength: 2,
                    select: function( event, ui ) {
            $('#id_lokasi').val(ui.item.id_lokasi);
                    }
                });
            });
        </script> 
          <style>                                                                         
            .ui-autocomplete {
                position: absolute;
                z-index: 1000;
                cursor: default;
                padding: 0;
                margin-top: 2px;
                list-style: none;
                background-color: #ffffff;
                border: 1px solid #ccc;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            }
            .ui-autocomplete > li {
                padding: 3px 10px;
            }
            .ui-autocomplete > li.ui-state-focus {
                background-color: #3399FF;
                color:#ffffff;
            }
            .ui-helper-hidden-accessible {
                display: none;
            }
        </style>

</body>

</html>
