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
<title>Sistem Informasi SNC</title>
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
                <li class="active">Job To Do</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ubah Job To Do</h1>
            </div>
        </div><!--/.row-->
<?php 
include "koneksi.php"; 

$id=$_GET['id']; 

$query=mysql_query("SELECT job_to_do2.swos, job_to_do2.nama_job_to_do, job_to_do2.id_owner, owner.nama_owner, job_to_do2.id_customer, job_to_do2.id_terima_pekerjaan, job_to_do2.id_detail_pekerjaan, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, job_to_do2.remark
  FROM job_to_do2
  JOIN customer ON job_to_do2.id_customer = customer.id_customer
  JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
  JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan
  JOIN owner ON job_to_do2.id_owner = owner.id_owner
  AND job_to_do2.id_job_to_do =  '$id'");
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?>      
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form role="form" action="update-job-to-do.php" method="post">
                            <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                            <input type="hidden" name="id" value="<?php echo $id;?>"/>

                                <div class="form-group">
                                    <label>SWOS</label>
                                    <input class="form-control" name="swos" value="<?php echo $row['swos']?>" maxlength="7">
                                    <div class="help-block with-errors"></div>
                                </div>
								
								<div class="form-group">
                                    <label>Nama Job to Do</label>
                                    <input class="form-control" name="nama_job_to_do" value="<?php echo $row['nama_job_to_do']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>
								
								<div class="form-group">
                                    <label>Owner</label>
                                    <select class="form-control" name="id_owner">
                                    <option>---- Pilih Owner ----</option>
                                    <option selected value="<?php echo $row['id_owner'];?>"><?php echo $row['nama_owner'];?></option>
                                    <?php
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
                                    <label>Nama Customer</label>
                                    <select class="form-control" name="id_customer">
                                    <option>---- Pilih Customer ----</option>
                                    <option selected value="<?php echo $row['id_customer'];?>"><?php echo $row['nama'];?></option>
                                    <?php
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
                                    <label>Terima Pekerjaan Dari</label>
                                    <select class="form-control" name="id_terima_pekerjaan" required>
                                    <option>---- Pilih Terima Pekerjaan ----</option>
                                    <option selected value="<?php echo $row['id_terima_pekerjaan'];?>"><?php echo $row['nama_terima_pekerjaan'];?></option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = mysql_query("SELECT * FROM terima_pekerjaan order by nama_terima_pekerjaan asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_terima_pekerjaan'].'">'.$data['nama_terima_pekerjaan'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                  <label>Date Time Open</label> 
                                     <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="datetime_open"value="<?php echo $row['datetime_open'];?>" />
                                        <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                </div>
                
                                <div class="form-group">
                                  <label>Date Time Finish</label>
                                  <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" name="datetime_finish" value="<?php echo $row['datetime_finish'];?>"/>
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label>Tipe Pekerjaan</label>
                                    <select class = "form-control" name="tipe_pekerjaan">
                                    <option selected value="<?php echo $row['tipe_pekerjaan'];?>"><?php echo $row['tipe_pekerjaan'];?></option>
                                    <option>---- Pilih Tipe Pekerjaan ----</option>
									<option>Activation Link Internet</option>
                                    <option>Activation Link VSAT</option>
                                    <option>Install Local Loop</option>   
									<option>Install Other</option>
									<option>Troubleshooting</option>
                                    <option>Troubleshooting Link Down</option>
                                    <option>Troubleshooting Link Intermittent</option>                                  
									<option>Survey</option>
									<option>Terminate</option>
                                    <option>Maintenance</option>
                                    <option>Backup/Restore</option>									
									<option>Transfer Domain</option>
									<option>Migrasi Hosting</option>
									<option>Migrasi Hosting & Domain</option>
									<option>Renewal</option>
                                    <option>Other</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Priority Pekerjaan</label>
                                    <select class = "form-control" name="priority_pekerjaan">
                                    <option selected value="<?php echo $row['priority_pekerjaan'];?>"><?php echo $row['priority_pekerjaan'];?></option>
                                    <option>Low</option>
                                    <option>Normal</option>
                                    <option>High</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Scope Pekerjaan</label>
                                    <select class = "form-control" name="scope_pekerjaan">
                                    <option selected value="<?php echo $row['scope_pekerjaan'];?>"><?php echo $row['scope_pekerjaan'];?></option>
                                    <option>Work Station</option>
                                    <option>Server</option>
                                    <option>Network</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Detail Pekerjaan</label>
                                    <select class="form-control" name="id_detail_pekerjaan">
                                    <option>---- Pilih Detail Pekerjaan ----</option>
                                    <option selected value="<?php echo $row['id_detail_pekerjaan'];?>"><?php echo $row['nama_detail_pekerjaan'];?></option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = mysql_query("SELECT * FROM detail_pekerjaan order by nama_detail_pekerjaan asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_detail_pekerjaan'].'" >'.$data['nama_detail_pekerjaan'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan Pekerjaan</label><br>
                                <textarea name="keterangan_pekerjaan" cols=68 rows=5><?php echo $row['keterangan_pekerjaan']?> </textarea> <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                  <label>Status Charge</label>
                                  <select class = "form-control" name="status_charge" required>
                                  <option selected value="<?php echo $row['status_charge'];?>"><?php echo $row['status_charge'];?></option>
                                  <option>---- Pilih Status ----</option>
                                  <option>Charge</option>
                                  <option>Free</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Status Job to Do</label>
                                  <select class = "form-control" name="status_jobtodo" required>
                                  <option selected value="<?php echo $row['status_jobtodo'];?>"><?php echo $row['status_jobtodo'];?></option>
                                  <option>---- Pilih Status Job to Do ----</option>
                                  <option>Open</option>
                                  <option>Close</option>
								  <option>Monitoring</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label>Remark</label>
                                    <input class="form-control" name="remark" value="<?php echo $row['remark']?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                                                                
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="../show-job-to-do.php" class="btn btn-default">Back</a>
                                
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
    <script src="/inventory/js/bootstrap-table.js"></script>
        <script src="/inventory/js/moment.js"></script>
        <script type="text/javascript" src="/inventory/js/bootstrap-datetimepicker.min.js"></script>
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


 