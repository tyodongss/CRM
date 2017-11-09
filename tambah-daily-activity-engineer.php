<?php
date_default_timezone_set('Asia/Makassar');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Informasi SNC</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/bootstrap-table.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="/css/bootstrap-datetimepicker-standalone.min.css">
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">


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
        <h1 class="page-header">Tambah Daily Activity</h1>
      </div>
    </div><!--/.row-->
        
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-md-6">
              <form data-toggle="validator" role="form" action="proses-daily-activity-engineer.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

                <div class="form-group">
                  <label>SWOS</label>
                  <input class="form-control" name="swos" value="" maxlength="7" required>
                  <div class="help-block with-errors"></div>
                </div>
                
                <div class="form-group">
                  <label>Nama Engineer</label>
                  <?php
                  $id = $_SESSION['id'];
                  if ($id!=""){
                  include "koneksi.php";
                  $sql = mysql_query("select id_engineer, nama_engineer from engineer where id_engineer='$id'");
                  while($row=mysql_fetch_array($sql)){ 
                  ?>
                  <select class = "form-control" name="id_engineer">
                  <option selected value="<?php echo $row['id_engineer'];?>"><?php echo $row['nama_engineer'];?></option>
                  <?}}?>
                </select>
                </div>

                <div class="form-group">
                <label>Tipe Pekerjaan</label>
                <select class = "form-control" name="tipe_pekerjaan" required>
                  <option>---- Pilih Tipe Pekerjaan ----</option>
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
				  
                </select>
                </div>

                <div class="form-group">
                  <label>Activity</label>
                  <input class="form-control" name="activity" value="" required>
                  <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                  <label>Nama Customer</label>
                  <select class="form-control" name="id_customer" required>
                  <option>---- Pilih Customer ----</option>
                  <?php
                  include "koneksi.php";
                  $sql = mysql_query("SELECT * FROM customer where status='Active' order by nama asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_customer'].'">'.$data['nama'].'</option>';
                    }
                  }
                  ?>
                </select>
                </div>      
                               
                <div class="form-group">
                  <label>Date Time Start</label> 
                      <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" name="datetime_start" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                </div>
                
                <div class="form-group">
                  <label>Date Time Finish</label>
                  <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="datetime_finish" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
				
				<div class="form-group">
                <label>OT</label>
                <select class = "form-control" name="ot" >
                  <option>No</option>
				  <option>Yes</option>
                </select>
                </div>
				
				<div class="form-group">
                <label>RB</label>
                <select class = "form-control" name="rb" >
                  <option>No</option>
				  <option>Yes</option>               			  
                </select>
                </div>
				
				<div class="form-group">
                <label>Trip Allowance</label>
                <select class = "form-control" name="trip_allowance" >
                  <option>No</option>
				  <option>Yes</option>                 			  
                </select>
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


  <script src="/js/jquery-1.11.1.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/chart.min.js"></script>
  <script src="/js/chart-data.js"></script>
  <script src="/js/easypiechart.js"></script>
  <script src="/js/easypiechart-data.js"></script>
  <script src="/js/bootstrap-datepicker.js"></script>
  <script src="/js/bootstrap-table.js"></script>
  <script src="/js/moment.js"></script>
  <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
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