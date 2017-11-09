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
				<li class="active">Backbone Problem</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah Backbone Problem</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
date_default_timezone_set('Asia/Makassar');
$query=mysql_query("select backbone_problem.id_backbone_problem,backbone_problem.swos,backbone_problem.reff,backbone_problem.id_circuit,circuit.nama_circuit,backbone_problem.id_backbone,backbone.nama_backbone,backbone_problem.description,backbone_problem.datetime_start,backbone_problem.datetime_end,backbone_problem.root_cause,backbone_problem.solved_after,backbone_problem.status_backbone_problem  from backbone_problem,circuit,backbone where circuit.id_circuit=backbone_problem.id_circuit and backbone.id_backbone=backbone_problem.id_backbone and id_backbone_problem='$id'"); 
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
														<form role="form" action="update-backbone-problem.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/>
								<div class="form-group">
									<label>SWOS</label>
									<input class="form-control" name="swos" value="<?php echo $row['swos'];?>">
								</div>
								<div class="form-group">
									<label>TICKET PARTNER</label>
									<input class="form-control" name="reff" value="<?php echo $row['reff']?>">
								</div>
								
								<div class="form-group">
									<label>Nama Backbone</label>
									<select class="form-control" name="id_backbone">
									<option>---- Pilih Backbone ----</option>
									<option selected value="<?php echo $row['id_backbone'];?>"><?php echo $row['nama_backbone'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM backbone order by nama_backbone asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_backbone'].'" >'.$data['nama_backbone'].'</option>';
										}
									}
									?>
								</select>
								</div>						
								
                                                                <div class="form-group">
                                                                        <label>Nama Circuit</label>
                                                                        <select class="form-control" name="id_circuit">
                                                                        <option>---- Pilih Circuit ----</option>
                                                                        <option selected value="<?php echo $row['id_circuit'];?>"><?php echo $row['nama_circuit'];?></option>
                                                                        <?php
                                                                        include "koneksi.php";
                                                                        $sql = mysql_query("SELECT * FROM circuit where status_circuit='Active' order by nama_circuit asc");
                                                                        if(mysql_num_rows($sql) != 0){
                                                                        while($data = mysql_fetch_assoc($sql)){
                                                                        echo '<option value="'.$data['id_circuit'].'" >'.$data['nama_circuit'].'</option>';
                                                                                }
                                                                        }
                                                                        ?>
                                                                </select>
                                                                </div>

								<div class="form-group">
                                    <label>Description</label>
                                    <select class = "form-control" name="description">
									<option>---- Pilih Description ----</option>
									<option selected value="<?php echo $row['description'];?>"><?php echo $row['description'];?></option>
                                    <option>Down</option>
                                    <option>Intermittent</option>                                              
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
									<label>Root Cause</label>
									<input class="form-control" name="root_cause" value="<?php echo $row['root_cause'];?>">
								</div>
								
								<div class="form-group">
									<label>Solved After</label>
									<input class="form-control" name="solved_after" value="<?php echo $row['solved_after'];?>">
								</div>
								
								<div class="form-group">
                                    <label>Status</label>
                                    <select class = "form-control" name="status_backbone_problem">
									<option>---- Pilih Status ----</option>
									<option selected value="<?php echo $row['status_backbone_problem'];?>"><?php echo $row['status_backbone_problem'];?></option>
                                    <option>Open</option>
                                    <option>Closed</option>                                              
                                    </select>
                                </div>						
								
															
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="../show-backbone-problem.php" class="btn btn-default">Back</a>
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
        <script src="/js/moment.js"></script>
        <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
	<script src="/js/bootstrap-table.js"></script>
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
