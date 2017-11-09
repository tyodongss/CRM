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
        <h1 class="page-header">Ubah Daily Activity</h1>
      </div>
    </div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("SELECT daily_activity.id_daily_activity, daily_activity.swos, daily_activity.id_engineer, daily_activity.tipe_pekerjaan, daily_activity.activity, daily_activity.id_customer, daily_activity.datetime_start, daily_activity.datetime_finish, daily_activity.ot, daily_activity.rb, daily_activity.trip_allowance, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at, engineer.nama_engineer, customer.nama
      FROM daily_activity, engineer, customer
      WHERE engineer.id_engineer = daily_activity.id_engineer
      AND customer.id_customer = daily_activity.id_customer
      AND daily_activity.deleted_at is NULL
      AND id_daily_activity='$id'"); 
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
              <form role="form" action="update-daily-activity.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
              <input type="hidden" name="id" value="<?php echo $id;?>"/>
                <div class="form-group">
                  <label>SWOS</label>
                  <input class="form-control" name="swos" value="<?php echo $row['swos'];?>">
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
                  <label>Tipe Pekerjaan</label>
                  <select class = "form-control" name="tipe_pekerjaan">
                  <option>---- Pilih Tipe Pekerjaan ----</option>
                  <option selected value="<?php echo $row['tipe_pekerjaan'];?>"><?php echo $row['tipe_pekerjaan'];?></option>
                  <option>Installation</option>
				  <option>Dismantle</option>
                  <option>Troubleshooting</option>
                  <option>Survey</option>
                  <option>Moving</option>
				  <option>IT Outsource</option>
                  <option>Misc Job</option>
                  <option>Trip</option>
                  <option>Rest</option>
                  <option>Duty</option>
                  <option>Idle Site</option>
                  <option>Idle</option> 
                  <option>Coding</option>
				  <option>Leave</option>
				  <option>Day Off</option>
				  <option>Sick</option>					  
                  </select>
                 </div>

                <div class="form-group">
                  <label>Activity</label>
                  <input class="form-control" name="activity" value="<?php echo $row['activity'];?>">
                </div>
                
                <div class="form-group">
                  <label>Nama Customer</label>
                  <select class="form-control" name="id_customer">
                  <option>---- Pilih Customer ----</option>
                  <option selected value="<?php echo $row['id_customer'];?>"><?php echo $row['nama'];?></option>
                  <?php
                  include "koneksi.php";
                  $sql = mysql_query("SELECT * FROM customer where status='Active' order by nama asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_customer'].'" >'.$data['nama'].'</option>';
                    }
                  }
                  ?>
                </select>
                </div>            
                                                
                <div class="form-group">
                  <label>Date Time Start</label> 
                    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="datetime_start" value="<?php echo $row['datetime_start'];?>" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                
                <div class="form-group">
                  <label>Date Time Finish</label>
                  <div class='input-group date' id='datetimepicker2'>
                  <input type='text' class="form-control" name="datetime_finish" value="<?php
                    if ($row['datetime_finish']==""){ 
                      print date('Y-m-d G:i:s');
                    } else { 
                      print $row['datetime_finish']; 
                    }
                  ?>">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
				
				<div class="form-group">
                  <label>OT</label>
                  <select class = "form-control" name="ot">                  
                  <option selected value="<?php echo $row['ot'];?>"><?php echo $row['ot'];?></option>
                  <option>No</option>
				  <option>Yes</option>                  				  
                  </select>
                 </div>
				 
				 <div class="form-group">
                  <label>RB</label>
                  <select class = "form-control" name="rb">
                  <option selected value="<?php echo $row['rb'];?>"><?php echo $row['rb'];?></option>
                  <option>No</option>
				  <option>Yes</option>                  				  
                  </select>
                 </div>
				 
				 <div class="form-group">
                  <label>Trip Allowance</label>
                  <select class = "form-control" name="trip_allowance">>
                  <option selected value="<?php echo $row['trip_allowance'];?>"><?php echo $row['trip_allowance'];?></option>
                  <option>No</option>
				  <option>Yes</option>>                  				  
                  </select>
                 </div>
                                
                <div class="form-group">
                  <label>Remark</label>
                  <input class="form-control" name="remark" value="<?php echo $row['remark'];?>">
                </div>
                              
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="../show-daily-activity.php" class="btn btn-default">Back</a>
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
