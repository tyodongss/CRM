<?php
date_default_timezone_set('Asia/Makassar');
session_start();
?>

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
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />


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
        <h1 class="page-header">Add Daily Activity</h1>
      </div>
    </div><!--/.row-->
        
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-md-6">
              <form data-toggle="validator" role="form" action="process-daily-activity-engineer.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                
                <div class="form-group">
					<label>Engineer Name</label>
					<select class="form-control" name="id_engineer" required>
					<?php
					$id = $_SESSION['id'];
                    if ($id!=""){
					include "koneksi.php";
					$sql = mysql_query("SELECT * FROM engineer WHERE id_engineer='$id'");
					if(mysql_num_rows($sql) != 0){
					while($data = mysql_fetch_assoc($sql)){
					echo '<option value="'.$data['id_engineer'].'">'.$data['name_engineer'].'</option>';
						}
					}
					}
					?>
					</select>
					<div class="help-block with-errors"></div>
                </div>
				
				<div class="form-group">
					<label>Support Parts</label>
					<select class="form-control" name="id_support_parts" required>
					<option>---- Choose Support ----</option>
					<?php
					include "koneksi.php";
					$sql = mysql_query("SELECT * FROM support_parts order by name_support_parts asc");
					if(mysql_num_rows($sql) != 0){
					while($data = mysql_fetch_assoc($sql)){
					echo '<option value="'.$data['id_support_parts'].'">'.$data['name_support_parts'].'</option>';
						}
					}
					?>
					</select>
					<div class="help-block with-errors"></div>
                </div>
				
				<div class="form-group">
                    <label>Activity</label>
                    <textarea name="activity" rows="5" cols="68"></textarea>
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
				
				<div class="form-group">
                    <label>Start Time</label> 
                    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="start_time" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                 </div>
                
                <div class="form-group">
                    <label>End Time</label>
                    <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="end_time" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                                         
                <div class="form-group">
					<label>Remark</label>
					<input class="form-control" name="remark" value="">
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
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/inventory/js/bootstrap.min.js"></script-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>


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
