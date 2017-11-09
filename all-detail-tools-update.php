<?php 
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
<link href="/css/datepicker3.css" rel="stylesheet">
<link href="/css/bootstrap-table.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">

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

  <div class="row">
    <div class="col-lg-12">
      <center><h1 class="page-header">All Detail Tools</h1></center>
      
      <?php
      include "koneksi.php";
      $id = $_GET['id'];
    $sql = "SELECT tools_update.id_tools_update, tools_update.swos, tools.serial_number, tools_update.id_tools, item.code_item, item.nama_item, tools_update.jumlah_update, tools_update.tgl_tools_update, tools_update.id_customer, customer.nama, tools_update.id_engineer, engineer.nama_engineer, tools_update.id_vendor, vendor.nama_vendor, tools_update.swos, tools_update.keterangan, tools_update.status_rma, tools_update.created_at, tools_update.updated_at, tools_update.deleted_at
          FROM tools_update, item, customer, engineer, vendor, tools
          WHERE tools_update.id_tools =  '$id'
          AND tools_update.id_tools = tools.id_tools
          AND tools.code_item = item.code_item
          AND tools_update.id_customer = customer.id_customer
          AND tools_update.id_engineer = engineer.id_engineer
          AND tools_update.id_vendor = vendor.id_vendor
          order by id_tools_update desc";

      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                  <th data-field="itemid"  data-filter-control="input">No</th>
                  <th data-field="swos"  data-filter-control="input">Swos</th>
                  <th data-field="code_item"  data-filter-control="input">Code Item</th>
                  <th data-field="nama_item"  data-filter-control="input">Nama Item</th>
                  <th data-field="serial_number"  data-filter-control="input">Serial Number</th>
                  <th data-field="keterangan"  data-filter-control="input">Keterangan</th>
                  <th data-field="jumlah_update"  data-filter-control="input">Jumlah Update</th>
                  <th data-field="tgl_tools_update"  data-filter-control="input">Tanggal Update</th>
                  <th data-field="nama"  data-filter-control="input">Nama Customer</th>
                  <th data-field="nama_engineer"  data-filter-control="input">Nama Engineer</th>
                  <th data-field="swos"  data-filter-control="input">Swos</th>
                  <th data-field="nama_vendor"  data-filter-control="input">Nama Vendor</th>
                  <th data-field="status_rma"  data-filter-control="input">Status RMA</th>
                </tr>
              </thead>
              <tbody>
<?php           
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                <tr>
                    <td data-field="id_job_to_do" data-sortable="true"><?php echo $no=$no+1;?></td>
                    <td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
                    <td data-field="code_item" data-sortable="true"><?php echo $record['code_item'];?></td>
                    <td data-field="nama_item" data-sortable="true"><?php echo $record['nama_item'];?></td>
                    <td data-field="serial_number" data-sortable="true"><?php echo $record['serial_number'];?></td>
                    <td data-field="keterangan" data-sortable="true"><?php echo $record['keterangan'];?></td>
                    <td data-field="jumlah_update" data-sortable="true"><?php echo $record['jumlah_update'];?></td>
                    <td data-field="tgl_tools_update" data-sortable="true"><?php echo $record['tgl_tools_update'];?></td>
                    <td data-field="nama" data-sortable="true"><?php echo $record['nama'];?></td>
                    <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                    <td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
                    <td data-field="nama_vendor" data-sortable="true"><?php echo $record['nama_vendor'];?></td>
                    <td data-field="status_rma" data-sortable="true"><?php echo $record['status_rma'];?></td>
                </tr>
<?php
}
?>  
                          
                </tbody>
            </table>

    </div>
  </div><!--/.row-->
</div>


  <script src="/js/jquery-1.11.1.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/chart.min.js"></script>
  <script src="/js/chart-data.js"></script>
  <script src="/js/easypiechart.js"></script>
  <script src="/js/easypiechart-data.js"></script>
  <script src="/js/bootstrap-datepicker.js"></script>
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
</body>

</html>