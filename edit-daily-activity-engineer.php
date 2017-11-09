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
<link rel="stylesheet" href="/inventory/css/bootstrap-datetimepicker-standalone.min.css">
<link rel="stylesheet" href="/inventory/css/bootstrap-datetimepicker.min.css">


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
        <h1 class="page-header">Edit Daily Activity</h1>
      </div>
    </div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("SELECT daily_activity.id_daily_activity, engineer.id_engineer, engineer.name_engineer, support_parts.id_support_parts, support_parts.name_support_parts, daily_activity.activity, customer.id_customer, customer.name_customer, daily_activity.start_time, daily_activity.end_time, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at
      FROM daily_activity, engineer, support_parts, customer
      WHERE daily_activity.id_engineer=engineer.id_engineer
	  AND daily_activity.id_support_parts=support_parts.id_support_parts
	  AND daily_activity.id_customer=customer.id_customer
      AND daily_activity.id_daily_activity='$id'"); 
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
              <form role="form" action="update-daily-activity-engineer.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
              <input type="hidden" name="id" value="<?php echo $id;?>"/>

                <div class="form-group">
					<label>Engineer Name</label>
					<select class="form-control" name="id_engineer">
					<option>---- Choose Engineer ----</option>
					<option selected value="<?php echo $row['id_engineer'];?>"><?php echo $row['name_engineer'];?></option>
					<?php
					include "koneksi.php";
					$id = $_SESSION['id'];
                    if ($id!=""){
					$sql = mysql_query("SELECT * FROM engineer WHERE id_engineer='$id'");
					if(mysql_num_rows($sql) != 0){
					while($data = mysql_fetch_assoc($sql)){
					echo '<option value="'.$data['id_engineer'].'" >'.$data['name_engineer'].'</option>';
					}
					}
					
					?>
                </select>
                </div>
				
				<div class="form-group">
					<label>Support Parts</label>
					<select class="form-control" name="id_support_parts" required>
					<option>---- Choose Support ----</option>
					<option selected value="<?php echo $row['id_support_parts'];?>"><?php echo $row['name_support_parts'];?></option>
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
				  <textarea name="activity" rows="5" cols="68" ><?php echo $row['activity'];?></textarea>
                </div>
                
                <div class="form-group">
                  <label>Customer Name</label>
                  <select class="form-control" name="id_customer">
                  <option>---- Choose Customer ----</option>
                  <option selected value="<?php echo $row['id_customer'];?>"><?php echo $row['name_customer'];?></option>
                  <?php
                  include "koneksi.php";
                  $sql = mysql_query("SELECT * FROM customer order by name_customer asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_customer'].'" >'.$data['name_customer'].'</option>';
                    }
                  }
                  ?>
                </select>
                </div>            
                                                
                <div class="form-group">
                  <label>Start Time</label> 
                    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="start_time" value="<?php echo $row['start_time'];?>" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                
                <div class="form-group">
                  <label>End Time</label>
                  <div class='input-group date' id='datetimepicker2'>
                  <input type='text' class="form-control" name="end_time" value="<?php
                    if ($row['end_time']==""){ 
                      print date('Y-m-d G:i:s');
                    } else { 
                      print $row['end_time']; 
                    }
                  ?>">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                                
                <div class="form-group">
                  <label>Remark</label>
                  <input class="form-control" name="remark" value="<?php echo $row['remark'];?>">
                </div>
                              
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="../show-daily-activity.php" class="btn btn-default">Back</a>
<?php
}}
?>  
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
        <script src="/inventory/js/moment.js"></script>
        <script type="text/javascript" src="/inventory/js/bootstrap-datetimepicker.min.js"></script>
  <script src="/inventory/js/bootstrap-table.js"></script>
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
