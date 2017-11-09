<?php 
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

    <div class="row">
        <div class="col-lg-12">
            <center><h1 class="page-header">Item Report</h1></center>
            
            <?php
            include "koneksi.php";

            $tgl=$_POST['date'];
            $status = $_POST['status'];
              

            ?>
      
      <?php            

            if ($status=="All"){
 
            $sql = "SELECT items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer					
					ORDER BY name_type ASC";		

            } else if ($status=="$status"){
 
            $sql = "SELECT items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer
					AND items.status = '$status'
					ORDER BY name_type ASC";			

            } else {
            $sql = "items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.status, items.remark
					FROM items, type, model, customer
					WHERE items.id_type=type.id_type
					AND items.id_model=model.id_model
					AND items.id_customer=customer.id_customer
					AND items.status = '$status'
					AND items.date_purchase = '$tgl' 
					ORDER BY name_type ASC";	

            }

            $hasil = mysql_query($sql); 
			$row = mysql_num_rows(mysql_query($sql));
            ?>

<form action="pdf.php" method="POST">

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>                                
								<th data-field="serial_number"  data-sortable="true">Serial Number</th>
								<th data-field="name_type" data-sortable="true">Type Name</th>
								<th data-field="name_model" data-sortable="true">Model Name</th>
								<th data-field="from_purchase" data-sortable="true">Purchased from</th>
								<th data-field="date_purchase" data-sortable="true">Purchase Date</th>
								<th data-field="contract_condition" data-sortable="true">Contract Condition</th>
								<th data-field="name_customer" data-sortable="true">Location</th>
								<th data-field="status" data-sortable="true">Status</th>
								<th data-field="remark" data-sortable="true">Remark</th>
                                
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?><input type="hidden" value="<?php echo $no=$no+1;?>" name="no[]"></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record['serial_number'];?><input type="hidden" value="<?php echo $record['serial_number'];?>" name="serial_number[]"></td>
								<td data-field="name_type" data-sortable="true"><?php echo $record['name_type'];?><input type="hidden" value="<?php echo $record['name_type'];?>" name="name_type[]"></td>
								<td data-field="name_model" data-sortable="true"><?php echo $record['name_model'];?><input type="hidden" value="<?php echo $record['name_model'];?>" name="name_model[]"></td>
								<td data-field="from_purchase" data-sortable="true"><?php echo $record['from_purchase'];?><input type="hidden" value="<?php echo $record['from_purchase'];?>" name="from_purchase[]"></td>
								<td data-field="date_purchase" data-sortable="true"><?php echo $record['date_purchase'];?><input type="hidden" value="<?php echo $record['date_purchase'];?>" name="date_purchase[]"></td>
								<td data-field="contract_condition" data-sortable="true"><?php echo $record['contract_condition'];?><input type="hidden" value="<?php echo $record['contract_condition'];?>" name="contract_condition[]"></td>
								<td data-field="name_customer" data-sortable="true"><?php echo $record['name_customer'];?><input type="hidden" value="<?php echo $record['name_customer'];?>" name="name_customer[]"></td>
								<td data-field="status" data-sortable="true"><?php echo $record['status'];?><input type="hidden" value="<?php echo $record['status'];?>" name="status[]"></td>
								<td data-field="remark" data-sortable="true"><?php echo $record['remark'];?><input type="hidden" value="<?php echo $record['remark'];?>" name="remark[]"></td>
                            </tr>
<?php
}
?>                     
                            </tbody>
                        </table>
                                 

        </div>
    </div><!--/.row-->
</div>

<input type="hidden" value="<?php print $_SESSION['name_engineer']?>" name="name_engineer">
<input type="hidden" value="<?php print $row ?>" name="row">
<input type="hidden" value="<?php print $time1 ?>" name="rstart">
<input type="hidden" value="<?php print $time2 ?>" name="rfinish">
<input type="hidden" value="item" name="menu">


<label>Export PDF</label>
<select name="menucat">
	<option value="backbone-problem-internal" selected>Internal Version</option>
	<option value="backbone-problem-cust">Customer Version</option>
</select>
<input type="submit" value="EXPORT TO PDF">


    <script src="/inventory/js/jquery-1.11.1.min.js"></script>
    <script src="/inventory/js/bootstrap.min.js"></script>
    <script src="/inventory/js/chart.min.js"></script>
    <script src="/inventory/js/chart-data.js"></script>
    <script src="/inventory/js/easypiechart.js"></script>
    <script src="/inventory/js/easypiechart-data.js"></script>
    <script src="/inventory/js/bootstrap-datepicker.js"></script>
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
</body>

</html>