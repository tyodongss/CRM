<?php
date_default_timezone_set('Asia/Makassar');
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
<!--link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/inventory/css/bootstrap.css" rel="stylesheet"/-->
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
        <?php include "menu.php"; ?>
        <!--    
    ==================================================== MENU
    -->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Item</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Item Report</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">Backbone Problem</div>-->
                    <div class="panel-body">
                        <div class="col-md-6">
                            
                            <form id="someForm" action="" method="POST">
                                <div class="form-group">
								  <!--label>Date Time Start</label> 
									  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="time1" value="">
								</div>
                
								<div class="form-group">
								  <label>Date Time End</label>
									  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="time2" value="">
								</div-->
                                
								<div class="form-group">
                                  <label>Status</label>
									<select class="form-control" name="status">
									<option>All</option>
									<option>Installed</option>
									<option>Stock</option>
									<option>Broken</option>
									</select>
								</div>                      
                                                            
								<input type="button" class="btn btn-info" value="Show" name="lihat" onclick="askForLihat()" />
								<input type="button" class="btn btn-primary" value="Download" name="download" onclick="askForDownload()" />
                                    </form>
                                    <script>
                                    form=document.getElementById("someForm");
                                    function askForLihat() {
                                            form.action="print-item-report.php";
                                            form.submit();
                                    }
                                    function askForDownload() {
                                            form.action="export-item-report.php";
                                            form.submit();
                                    }
                                    </script>                             
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->

	<script src="/inventory/js/bootstrap.min.js"></script>
	<script src="/inventory/js/chart.min.js"></script>
	<script src="/inventory/js/chart-data.js"></script>
	<script src="/inventory/js/easypiechart.js"></script>
	<script src="/inventory/js/easypiechart-data.js"></script>
	<script src="/inventory/js/bootstrap-datepicker.js"></script>
	<script src="/inventory/js/bootstrap-table.js"></script>
	<script src="/inventory/js/validator.js"></script>
  <script>

</body>

</html>
