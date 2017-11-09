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
<link rel="stylesheet" href="/inventory/css/bootstrap-datetimepicker-standalone.min.css">
<link rel="stylesheet" href="/inventory/css/bootstrap-datetimepicker.min.css">


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
                <li class="active">Daily Activity</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Daily Activity Report</h1>
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
								  <label>Date Time Start</label> 
									  <div class='input-group date' id='datetimepicker1'>
										<input type='text' class="form-control" name="time1" />
											<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
								</div>
                
								<div class="form-group">
								  <label>Date Time End</label>
									  <div class='input-group date' id='datetimepicker2'>
										<input type='text' class="form-control" name="time2" />
											<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
								</div>
                                
								<div class="form-group">
                                  <label>Engineer Name</label>
									<select class="form-control" name="name_engineer" required>
									<option>---- Choose Engineer ----</option>
									<?php
									include "koneksi.php";
									if ($_SESSION['role']="administrator"){
											$sql = mysql_query("SELECT * FROM engineer order by name_engineer asc");
											echo '<option value="All">All</option>';
											while ($data=mysql_fetch_assoc($sql)){                
													echo '<option value="'.$data['name_engineer'].'">'.$data['name_engineer'].'</option>';
											}
									} else {
											$nm = $_SESSION['name_engineer'];
											$sql = mysql_query("SELECT * FROM engineer where name_engineer='$nm'");
											while ($data=mysql_fetch_assoc($sql)){
											echo '<option value="'.$data['name_engineer'].'" selected>'.$data['name_engineer'].'</option>';
										}
									}
									?>
									</select>
								</div>                      
                                                            
								<input type="button" class="btn btn-info" value="Show" name="lihat" onclick="askForLihat()" />
								<?php 
								if ($_SESSION['role']="administrator"){ 
								?>
									<input type="button" class="btn btn-primary" value="Download" name="download" onclick="askForDownload()" />
								<?php } ?>
                                    </form>
                                    <script>
                                    form=document.getElementById("someForm");
                                    function askForLihat() {
                                            form.action="print-daily-activity-report.php";
                                            form.submit();
                                    }
                                    function askForDownload() {
                                            form.action="export-daily-activity-report.php";
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


    <script src="/inventory/js/jquery-1.11.1.min.js"></script>
    <script src="/inventory/js/bootstrap.min.js"></script>
    <script src="/inventory/js/chart.min.js"></script>
    <script src="/inventory/js/chart-data.js"></script>
    <script src="/inventory/js/easypiechart.js"></script>
    <script src="/inventory/js/easypiechart-data.js"></script>
    <script src="/inventory/js/bootstrap-datepicker.js"></script>
    <script src="/inventory/js/bootstrap-table.js"></script>
    <script src="/inventory/js/moment.js"></script>
    <script type="text/javascript" src="/inventory/js/bootstrap-datetimepicker.min.js"></script>
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
<script type="text/javascript">
      $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#datetimepicker2').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss'
                });
      });
    </script>    
</body>

</html>
