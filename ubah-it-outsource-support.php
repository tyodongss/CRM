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

<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/datepicker3.css" rel="stylesheet">
<link href="/css/bootstrap-table.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="/css/bootstrap-datetimepicker-standalone.min.css">
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

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
                <li class="active">IT Outsource</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ubah IT Outsource</h1>
            </div>
        </div><!--/.row-->
<?php 
include "koneksi.php"; 

$id=$_GET['id'];
//$query=mysql_query("select it_outsource.id_it_outsource, it_outsource.complain_via, it_outsource.tipe_pekerjaan, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.detail_pekerjaan,  it_outsource.keterangan_pekerjaan, customer.nama from it_outsource, customer where customer.id_customer=it_outsource.id_customer and id_it_outsource='$id'"); 

//$query=mysql_query("select * from it_outsource,customer where id_it_outsource='$id' and it_outsource.id_customer=customer.id_customer"); 

$query=mysql_query("select it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.id_engineer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.tipe_pekerjaan, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.keterangan_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.created_at, it_outsource.updated_at, it_outsource.deleted_at, customer.nama, engineer.nama_engineer, detail_pekerjaan.nama_detail_pekerjaan from it_outsource,customer,engineer,detail_pekerjaan where customer.id_customer=it_outsource.id_customer and engineer.id_engineer=it_outsource.id_engineer and detail_pekerjaan.id_detail_pekerjaan=it_outsource.id_detail_pekerjaan and id_it_outsource='$id'");
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?>      
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">IT Outsource</div>-->
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form role="form" action="update-it-outsource-support.php" method="post">
                            <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                            <input type="hidden" name="id" value="<?php echo $id;?>"/>

                                <div class="form-group">
									<label>Nama Customer</label>
									<select class="form-control" name="id_customer">
									<option>---- Pilih Customer ----</option>
									<option selected value="<?php echo $row['id_customer'];?>"><?php echo $row['nama'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM customer order by nama asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_customer'].'" >'.$data['nama'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
                                    <label>Nama User Komplain/Request</label>
                                    <input class="form-control" name="nama_user" value="<?php echo $row['nama_user']?>">                                  
                                </div>

                                <div class="form-group">
                                    <label>Complain Via</label>
                                    <select class = "form-control" name="complain_via"> 
                                    <option selected value="<?php echo $row['complain_via'];?>"><?php echo $row['complain_via'];?></option>
                                    <option>Telepon</option>
                                    <option>Email</option>
                                    <option>WhatsApp</option>
                                    <option>Verbal</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tipe Pekerjaan</label>
                                    <select class = "form-control" name="tipe_pekerjaan">
                                    <option selected value="<?php echo $row['tipe_pekerjaan'];?>"><?php echo $row['tipe_pekerjaan'];?></option>
                                    <option>Troubleshooting</option>
                                    <option>Install</option>
                                    <option>Maintenance</option>
                                    <option>Monitoring</option>
									<option>Backup/Restore</option>
									<option>Idle</option>
                                    <option>Other</option>
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
								  <label>Date Time End</label>
									<div class='input-group date' id='datetimepicker2'>
									<input type='text' class="form-control" name="datetime_end" value="<?php
										if ($row['datetime_end']==""){ 
											print date('Y-m-d G:i:s');
										} else { 
											print $row['datetime_end']; 
										}
									?>">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
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
				                </select>
				                <? }} ?>
				                </div>
                                                                
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="../show-it-outsource-support.php" class="btn btn-default">Back</a>
                                
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


 