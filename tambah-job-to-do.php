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

        <?php include "menu.php"; 
        include "koneksi.php" ?>

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
                <h1 class="page-header">Tambah Job to Do</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">Job to Do</div>-->
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form data-toggle="validator" role="form" action="proses-job-to-do.php" method="post">
                            <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

                                <div class="form-group">
                                    <label>SWOS</label>
                                    <input class="form-control" name="swos" value="" maxlength="7" placeholder="Jika tidak ada SWOS maka dikosongkan saja, tidak perlu diberi tanda -">
                                    <div class="help-block with-errors"></div>
                                </div> 
								
								<div class="form-group">
                                    <label>Nama Job to Do</label>
                                    <input class="form-control" name="nama_job_to_do" value="" required>
                                    <div class="help-block with-errors"></div>
                                </div> 
								
								<div class="form-group">
                                     <label>Owner</label>
                                    <?php    
                                    $result = mysql_query("select * from owner order by nama_owner asc");  
                                    $jsArray = "var prdName = new Array();\n";  
                                    echo '<select class="form-control" name="id_owner" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">';  
                                    echo '<option>---- Pilih Owner ----</option>';  
                                    while ($row = mysql_fetch_array($result)) {  
                                        echo '<option value="' . $row['id_owner'] . '">' . $row['nama_owner'] . '</option>';  
                                        $jsArray .= "prdName['" . $row['id_owner'] . "'] = '" . addslashes($row['email_owner']) . "';\n";  
                                    }  
                                    echo '</select>';  
                                    ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="email_owner" id="prd_name"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray; ?>  
                                    </script> 
                                </div>
								
                                <!--div class="form-group">
                                    <label>Nama Customer</label>
                                    <select class="form-control" name="id_customer" required>
                                    <?php
                                   // $sql = mysql_query("SELECT * FROM customer where status='Active' order by nama asc");
                                   // if(mysql_num_rows($sql) != 0){
                                   // while($data = mysql_fetch_assoc($sql)){
                                   // echo '<option value="'.$data['id_customer'].'">'.$data['nama'].'</option>';
                                   //     }
                                   // }
                                   // ?>
                                </select>
                                </div-->
                                
                              <div class="form-group">
                                     <label>Customer</label>
                                      <?php    
                                      $result2 = mysql_query("select * from customer where status='Active' order by nama asc");  
                                      $jsArray2 = "var prdName2 = new Array();\n";  
                                      echo '<select class="form-control" name="id_customer" onchange="document.getElementById(\'prd_name2\').value = prdName2[this.value]">';  
                                      echo '<option>---- Pilih Customer ----</option>';  
                                      while ($row2 = mysql_fetch_array($result2)) {  
                                          echo '<option value="' . $row2['id_customer'] . '">' . $row2['nama'] . '</option>';  
                                          $jsArray2 .= "prdName2['" . $row2['id_customer'] . "'] = '" . addslashes($row2['nama']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_customer" id="prd_name2"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray2; ?>  
                                    </script> 
                                </div>

                                 <div class="form-group">
                                     <label>Engineer 1</label>
                                      <?php    
                                      $result5 = mysql_query("select * from engineer where status='active' order by nama_engineer asc");  
                                      $jsArray5 = "var prdName5 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer" onchange="document.getElementById(\'prd_name5\').value = prdName5[this.value]">';  
                                      echo '<option>---- Pilih Engineer 1 ----</option>';  
                                      while ($row5 = mysql_fetch_array($result5)) {  
                                          echo '<option value="' . $row5['id_engineer'] . '">' . $row5['nama_engineer'] . '</option>';  
                                          $jsArray5 .= "prdName5['" . $row5['id_engineer'] . "'] = '" . addslashes($row5['nama_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_engineer1" id="prd_name5"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray5; ?>  
                                    </script> 
                                </div>

                               <div class="form-group">
                                     <label>Engineer 2</label>
                                      <?php    
                                      $result6 = mysql_query("select * from engineer where status='active' order by nama_engineer asc");  
                                      $jsArray6 = "var prdName6 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer2" onchange="document.getElementById(\'prd_name6\').value = prdName6[this.value]">';  
                                      echo '<option>---- Pilih Engineer 2 ----</option>';  
                                      while ($row6 = mysql_fetch_array($result6)) {  
                                          echo '<option value="' . $row6['id_engineer'] . '">' . $row6['nama_engineer'] . '</option>';  
                                          $jsArray6 .= "prdName6['" . $row6['id_engineer'] . "'] = '" . addslashes($row6['nama_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_engineer2" id="prd_name6"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray6; ?>  
                                    </script> 
                                </div>

                                <div class="form-group">
                                     <label>Engineer 3</label>
                                      <?php    
                                      $result7 = mysql_query("select * from engineer where status='active' order by nama_engineer asc");  
                                      $jsArray7 = "var prdName7 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer3" onchange="document.getElementById(\'prd_name7\').value = prdName7[this.value]">';  
                                      echo '<option>---- Pilih Engineer 3 ----</option>';  
                                      while ($row7 = mysql_fetch_array($result7)) {  
                                          echo '<option value="' . $row7['id_engineer'] . '">' . $row7['nama_engineer'] . '</option>';  
                                          $jsArray7 .= "prdName7['" . $row7['id_engineer'] . "'] = '" . addslashes($row7['nama_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_engineer3" id="prd_name7"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray7; ?>  
                                    </script> 
                                </div>

                                 <div class="form-group">
                                     <label>Engineer 4</label>
                                      <?php    
                                      $result8 = mysql_query("select * from engineer where status='active' order by nama_engineer asc");  
                                      $jsArray8 = "var prdName8 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer4" onchange="document.getElementById(\'prd_name8\').value = prdName8[this.value]">';  
                                      echo '<option>---- Pilih Engineer 4 ----</option>';  
                                      while ($row8 = mysql_fetch_array($result8)) {  
                                          echo '<option value="' . $row8['id_engineer'] . '">' . $row8['nama_engineer'] . '</option>';  
                                          $jsArray8 .= "prdName8['" . $row8['id_engineer'] . "'] = '" . addslashes($row8['nama_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_engineer4" id="prd_name8"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray8; ?>  
                                    </script> 
                                </div>

                               <div class="form-group">
                                     <label>Terima Pekerjaan Dari</label>
                                      <?php    
                                      $result3 = mysql_query("select * from terima_pekerjaan order by nama_terima_pekerjaan asc");  
                                      $jsArray3 = "var prdName3 = new Array();\n";  
                                      echo '<select class="form-control" name="id_terima_pekerjaan" onchange="document.getElementById(\'prd_name3\').value = prdName3[this.value]">';  
                                      echo '<option>---- Pilih Terima Pekerjaan ----</option>';  
                                      while ($row3 = mysql_fetch_array($result3)) {  
                                          echo '<option value="' . $row3['id_terima_pekerjaan'] . '">' . $row3['nama_terima_pekerjaan'] . '</option>';  
                                          $jsArray3 .= "prdName3['" . $row3['id_terima_pekerjaan'] . "'] = '" . addslashes($row3['nama_terima_pekerjaan']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_terima_pekerjaan" id="prd_name3"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray3; ?>  
                                    </script> 
                                </div>

                                <div class="form-group">
                                  <label>Date Time Open</label> 
                                      <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="datetime_open" />
                                        <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                </div>
                
                                <div class="form-group">
                                  <label>Date Time Finish</label>
                                  <div class='input-group date' id='datetimepicker2'>
                                    <!-- <input class="form-control" name="datetime_finish" value="" type="datetime"> -->
                                    <input type='text' class="form-control" name="datetime_finish" />
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Tipe Pekerjaan</label>
                                    <select class = "form-control" name="tipe_pekerjaan">
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
									<option>Register Domain</option>
									<option>Register Hosting & Domain</option>
									<option>Renewal</option>
                                    <option>Other</option>
                                    </select>
                                </div>

                               <div class="form-group">
                                    <label>Priority Pekerjaan</label>
                                    <select class = "form-control" name="priority_pekerjaan" required>
                                    <option>Low</option>
                                    <option>Normal</option>
                                    <option>High</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Scope Pekerjaan</label>
                                    <select class = "form-control" name="scope_pekerjaan" required>
                                    <option>Work Station</option>
                                    <option>Server</option>
                                    <option>Network</option>
									<option>Hosting</option>
                                    </select>
                                </div>                                
                                
                               <div class="form-group">
                                     <label>Detail Pekerjaan</label>
                                      <?php    
                                      $result4 = mysql_query("select * from detail_pekerjaan order by nama_detail_pekerjaan asc");  
                                      $jsArray4 = "var prdName4 = new Array();\n";  
                                      echo '<select class="form-control" name="id_detail_pekerjaan" onchange="document.getElementById(\'prd_name4\').value = prdName4[this.value]">';  
                                      echo '<option>---- Pilih Detail Pekerjaan ----</option>';  
                                      while ($row4 = mysql_fetch_array($result4)) {  
                                          echo '<option value="' . $row4['id_detail_pekerjaan'] . '">' . $row4['nama_detail_pekerjaan'] . '</option>';  
                                          $jsArray4 .= "prdName4['" . $row4['id_detail_pekerjaan'] . "'] = '" . addslashes($row4['nama_detail_pekerjaan']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_detail_pekerjaan" id="prd_name4"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray4; ?>  
                                    </script> 
                                </div>
                                                            
                                 <div class="form-group">
                                    <label>Keterangan Pekerjaan</label>
                                    <textarea name="keterangan_pekerjaan" rows="5" cols="68"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div> 

                                <div class="form-group">
                                  <label>Status Charge</label>
                                  <select class = "form-control" name="status_charge" required>
                                  <option>---- Pilih Status ----</option>
                                  <option>Charge</option>
                                  <option>Free</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Status Job to Do</label>
                                  <select class = "form-control" name="status_jobtodo" required>
                                  <option>---- Pilih Status Job to Do ----</option>
                                  <option>Open</option>
                                  <option>Close</option>
                                  <option>Monitoring</option>
								  </select>
                                </div>

                                 <div class="form-group">
                                    <label>Remark</label>
                                    <input class="form-control" name="remark" value="">
                                    <div class="help-block with-errors"></div>
                                </div> 

                                <button type="submit" class="btn btn-primary" name="kirim">Save</button>
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
