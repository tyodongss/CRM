<?php
session_start();
?>
<!--  -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRM S-Net</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link href="/inventory/css/bootstrap.min.css" rel="stylesheet">
<link href="/inventory/css/datepicker3.css" rel="stylesheet">
<link href="/inventory/css/bootstrap-table.css" rel="stylesheet">
<link href="/inventory/css/styles.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />


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
                                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal"></span> S-Net<span></span></a>
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
        <li class="active">Item Update</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Add Item Update</h1>
      </div>
    </div><!--/.row-->
        
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!--<div class="panel-heading">Stok Masuk</div>-->
          <div class="panel-body">
            <div class="col-md-6">
              <form data-toggle="validator" role="form" action="process-item-update.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

        
				<div class="form-group">
					<label>Serial Number</label><br>
					<select class="selectpicker" name="id_items" data-live-search="true" data-width="100%">
					<option>---- Choose S/N ----</option>
                    <?php
                    include "koneksi.php";
                    $sql = mysql_query("SELECT * FROM items order by serial_number asc");
                    if(mysql_num_rows($sql) != 0){
                    while($data = mysql_fetch_assoc($sql)){
                    echo '<option value="'.$data['id_items'].'">'.$data['serial_number'].'</option>';
                      }
                    }
                    ?>					
					</select>
				</div>

				<div class="form-group">
					<label>Date Update</label>
					<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="date_update" value="">
				</div>
				
				<div class="form-group">
					<label>Purpose</label>
					<select class = "form-control" name="purpose">
					<option>---- Choose Purpose ----</option>
					<option>New Install</option>
					<option>Replacement</option>
					<option>Dismantle</option>					
					</select>
				</div>
				
				<div class="form-group">
					<label>Purpose Name Item</label>
					<input class="form-control" name="purpose_name_item">
				</div> 
				
				<div class="form-group">
					<label>Customer Name</label><br>
					<select class="selectpicker" name="id_customer" data-live-search="true" data-width="100%">
					<option>---- Choose Customer ----</option>
                    <?php
                    include "koneksi.php";
                    $sql = mysql_query("SELECT * FROM customer order by name_customer asc");
                    if(mysql_num_rows($sql) != 0){
                    while($data = mysql_fetch_assoc($sql)){
                    echo '<option value="'.$data['id_customer'].'">'.$data['name_customer'].'</option>';
                      }
                    }
                    ?>					
					</select>
				</div>
				
				<div class="form-group" id="engineer">
					<label>Engineer</label>
					<select class="form-control" name="id_engineer">
					<option>---- Choose Engineer ----</option>
					<?php
					$sql = mysql_query("SELECT * FROM engineer order by name_engineer asc");
					if(mysql_num_rows($sql) != 0){
					while($data = mysql_fetch_assoc($sql)){
					echo '<option value="'.$data['id_engineer'].'">'.$data['name_engineer'].'</option>';
					  }
					}
					?>
					</select>
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


  <!--script src="/inventory/js/jquery-1.11.1.min.js"></script-->
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
                $( "#code_item" ).autocomplete({
                    source: "tes2.php",
                    minLength: 2,
                    select: function( event, ui ) {
            $('#nama_item').val(ui.item.nama_item);
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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/inventory/js/bootstrap.min.js"></script-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

        <script>
        $('#dbType').change(function(){
           selection = $(this).val();    
           switch(selection)
           { 
               case 'asset keluar':
                   $('#assetKeluar').show();
                   $('#engineer').show();
                   $('#assetDismantle').hide();
                   $('#assetRMA').hide();
                   break;
               case 'asset dismantle':
                   $('#assetDismantle').show();
                   $('#engineer').show();
                   $('#assetKeluar').hide();
                   $('#assetRMA').hide();
                   break;
               case 'asset rma':
                   $('#assetRMA').show();
                   $('#assetDismantle').hide();
                   $('#assetKeluar').hide();
                   $('#engineer').hide();
                   break;    
               default:
                   $('#assetKeluar').hide();
                   $('#assetDismantle').hide();
                   $('#assetRMA').hide();
                   break;
           }
        });
        </script>

</body>

</html>
