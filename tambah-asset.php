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

<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/datepicker3.css" rel="stylesheet">
<link href="/css/bootstrap-table.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">
<!--link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/-->
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
    <?php include "menu.php";
    include "koneksi.php";
     ?>
    <!--  
  ==================================================== MENU
  -->
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Asset</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Tambah Asset</h1>
      </div>
    </div><!--/.row-->
        
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!--<div class="panel-heading">Stok Masuk</div>-->
          <div class="panel-body">
            <div class="col-md-6">
              <form data-toggle="validator" role="form" action="proses-asset.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

            <div class="form-group">
                <label for="nama_item">Nama Item</label>
                <input class="form-control" id="nama_item">
            </div>

            <div class="form-group">
                <label for="code_item">Code Item</label>
                <input class="form-control" name="code_item" id="code_item">
            </div>

            <div class="form-group">
                <label for="nama_kategori_item">Kategori</label>
                <input class="form-control" id="nama_kategori_item">
            </div>

            <div class="form-group">
                <!--label for="code_item">ID Kategori</label-->
                <input class="form-control" type="hidden" name="id_kategori_item" id="id_kategori_item">
            </div>

                <div class="form-group">
                  <label>Owner</label>
                  <select class="form-control" name="id_owner" required>
                  <option>---- Pilih Owner ----</option>
                  <?php
                  $sql = mysql_query("SELECT * FROM owner order by nama_owner asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_owner'].'">'.$data['nama_owner'].'</option>';
                    }
                  }
                  ?>
                </select>
                <div class="help-block with-errors"></div>
                </div>

                  <div class="form-group">
                  <label>Lokasi</label>
                  <select class="form-control" name="id_lokasi" required>
                  <option>---- Pilih Lokasi ----</option>
                  <?php
                  $sql = mysql_query("SELECT * FROM lokasi order by nama_lokasi asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_lokasi'].'">'.$data['nama_lokasi'].'</option>';
                    }
                  }
                  ?>
                </select>
                <div class="help-block with-errors"></div>
                </div>
                
                <div class="form-group">
                  <label>Nama Vendor</label>
                  <select class="form-control" name="id_vendor" required>
                  <option>---- Pilih Vendor ----</option>
                  <?php
                  $sql = mysql_query("SELECT * FROM vendor order by nama_vendor asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_vendor'].'">'.$data['nama_vendor'].'</option>';
                    }
                  }
                  ?>
                </select>
                <div class="help-block with-errors"></div>
                </div>
                
                <div class="form-group">
                  <label>Serial Number</label>
                  <input class="form-control" name="serial_number" value="" >
                  <div class="help-block with-errors"></div>
                </div>
				
				<div class="form-group">
                  <label>Jumlah Awal</label>
                  <input class="form-control" name="jumlah_awal" value="" maxlength="30" >
                  <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                  <label>Jumlah Stok</label>
                  <input class="form-control" name="jumlah_stok" value="" maxlength="30" >
                  <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                  <label>Kondisi</label>
                  <select class = "form-control" name="kondisi">
                  <option>bagus</option>
                  <option>rusak</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>PO Number</label>
                  <input class="form-control" name="po_number" value="" maxlength="20">
                </div>                                               
                
                <div class="form-group">
                  <label>Tanggal Masuk</label>
                  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_masuk" value="">
                  <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                  <label>Status Asset</label>
                  <input class="form-control" name="status_asset" value="tersedia" maxlength="20" required>
                <div class="help-block with-errors"></div>
                </div>
				
				         <div class="form-group">
                  <label>Nilai Perolehan</label>
                  <input class="form-control" name="nilai_perolehan" maxlength="30 "value="">
                </div>
				
                <div class="form-group">
                  <label>Umur (Tahun)</label>
                  <input class="form-control" name="umur" maxlength="30 "value="">
                </div>   

                <div class="form-group">
                  <label>Remark</label>
                  <input class="form-control" name="remark" maxlength="30 "value="">
                </div>                
                              
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-default">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.col-->
    </div><!-- /.row -->
    
  </div><!--/.main-->


  <!--script src="/js/jquery-1.11.1.min.js"></script-->
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/chart.min.js"></script>
  <script src="/js/chart-data.js"></script>
  <script src="/js/easypiechart.js"></script>
  <script src="/js/easypiechart-data.js"></script>
  <script src="/js/bootstrap-datepicker.js"></script>
  <script src="/js/bootstrap-table.js"></script>
  <script src="/js/validator.js"></script>
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
                $( "#nama_kategori_item" ).autocomplete({
                    source: "namaKategori.php",
                    minLength: 2,
                    select: function( event, ui ) {
            $('#id_kategori_item').val(ui.item.id_kategori_item);
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
