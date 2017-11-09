<ul class="nav menu">
    <li class="active"><a href="dashboard.php">Dashboard</a></li>

<?php
if ($_SESSION['role']=="warehouse"){
?>
<li class="parent">
    <a data-toggle="collapse" href="#sub-item-2">
        <span data-toggle="collapse" href="#sub-item-2" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-2">
                <li><a href="show-asset.php"><span class="glyphicon glyphicon-tasks"></span>List Asset</a></li>
                <li><a href="show-asset-update.php"><span class="glyphicon glyphicon-tasks"></span>List Asset Update</a></li>
				<li><a href="show-barang.php"><span class="glyphicon glyphicon-tasks"></span>List Barang</a></li>
				<li><a href="show-barang-update.php"><span class="glyphicon glyphicon-tasks"></span>List Barang Update</a></li>
                <li><a href="show-consumable.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Masuk</a></li>
                <li><a href="show-consumable-keluar.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Keluar</a></li>
                <li><a href="show-item.php"><span class="glyphicon glyphicon-tasks"></span>List Item</a></li>
				<li><a href="show-tools.php"><span class="glyphicon glyphicon-tasks"></span>List Tools</a></li>
				<li><a href="show-tools-update.php"><span class="glyphicon glyphicon-tasks"></span>List Tools Update</a></li>
     </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-3">
        <span data-toggle="collapse" href="#sub-item-3" class="glyphicon glyphicon-th">
        </span>
        LAPORAN BARANG
        <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-3">
				<li><a href="show-laporan-asset-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Asset</a></li> 
                <li><a href="show-laporan-barang-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang</a></li>
                <li><a href="show-laporan-barang-update.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang Update</a></li>             
                <li><a href="show-laporan-consumable-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Consumable</a></li>				  
				<li><a href="show-laporan-tools-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Tools</a></li>  
         </ul>
    </li>
    <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
    
<?php } ?>

<?php
if ($_SESSION['role']=="sales"){
?>
<li class="parent">
    <a data-toggle="collapse" href="#sub-item-10">
        <span data-toggle="collapse" href="#sub-item-10" class="glyphicon glyphicon-th">
        </span>
        DOMAIN
        <span data-toggle="collapse" href="#sub-item-10" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-10">
        <li><a href="show-domain.php"><span class="glyphicon glyphicon-tasks"></span>List Domain</a></li>
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-12">
        <span data-toggle="collapse" href="#sub-item-12" class="glyphicon glyphicon-th">
        </span>
        CUSTOMER
        <span data-toggle="collapse" href="#sub-item-12" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-12">
        <li><a href="show-customer-sales.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-11">
        <span data-toggle="collapse" href="#sub-item-11" class="glyphicon glyphicon-th">
        </span>
        LAPORAN
        <span data-toggle="collapse" href="#sub-item-11" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-11">
        <li><a href="show-laporan-customer.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Customer</a></li>
        <li><a href="show-laporan-domain.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Domain Expired</a></li>
     </ul>
    </li>
    
<?php } ?>

<?php 
if ($_SESSION['role']=="support"){
?>

<li class="parent">
    <a data-toggle="collapse" href="#sub-item-14">
        <span data-toggle="collapse" href="#sub-item-14" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-14" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-14">
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
     </ul>
    </li>

<li class="parent">
    <a data-toggle="collapse" href="#sub-item-1">
        <span data-toggle="collapse" href="#sub-item-1" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-1">
        <li><a href="show-data-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity-support.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-it-outsource-support.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
        <li><a href="show-job-to-do-support.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update-support.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-11">
        <span data-toggle="collapse" href="#sub-item-11" class="glyphicon glyphicon-th">
        </span>
        LAPORAN
        <span data-toggle="collapse" href="#sub-item-11" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-11">
        <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily <?php print $_SESSION['nama_engineer']?></a></li>
        <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI <?php print $_SESSION['nama_engineer']?></a></li>
     </ul>
    </li>

    
<?php } ?>

<?php 
if ($_SESSION['role']=="customer"){
?>

<li class="parent">
    <a data-toggle="collapse" href="#sub-item-8">
        <span data-toggle="collapse" href="#sub-item-8" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-8">
        <li><a href="show-it-outsource-pbu.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>

<li class="parent">
    <a data-toggle="collapse" href="#sub-item-9">
        <span data-toggle="collapse" href="#sub-item-9" class="glyphicon glyphicon-th">
        </span>
        Laporan
        <span data-toggle="collapse" href="#sub-item-9" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-9">
        <li><a href="show-laporan-it-outsource-pbu.php"><span class="glyphicon glyphicon-tasks"></span>Laporan IT Outsource</a></li>
     </ul>
    </li>
    
<?php } ?>

<?php 
if ($_SESSION['role']=="paa"){
?>

<li class="parent">
    <a data-toggle="collapse" href="#sub-item-15">
        <span data-toggle="collapse" href="#sub-item-15" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-15" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-15">
        <li><a href="show-ca-budget.php"><span class="glyphicon glyphicon-tasks"></span>CA Budget</a></li>
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>   
     </ul>
    </li>
	
	<li class="parent">
    <a data-toggle="collapse" href="#sub-item-16">
        <span data-toggle="collapse" href="#sub-item-16" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-16" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-16">
        <li><a href="show-customer-sales.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>

     </ul>
    </li>
	<li class="parent">
    <a data-toggle="collapse" href="#sub-item-18">
        <span data-toggle="collapse" href="#sub-item-18" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CA
        <span data-toggle="collapse" href="#sub-item-18" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-18">
				<li><a href="show-laporan-ca.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
				<li><a href="show-laporan-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
				<li><a href="show-laporan-ca-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>CA Job to Do</a></li>
         </ul>
    </li>
    
<?php } ?>
    
<?php 
if ($_SESSION['role']=="noc"){
?>
<li class="parent">
    <a data-toggle="collapse" href="#sub-item-6">
        <span data-toggle="collapse" href="#sub-item-6" class="glyphicon glyphicon-th">
        </span>
        BACKBONE
        <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-6">
        <li><a href="show-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem</a></li>
        <li><a href="show-history-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem History</a></li>
	 <li><a href="show-traffic-usage.php"><span class="glyphicon glyphicon-tasks"></span>Traffic Usage</a></li>
        <li><a href="show-backbone.php"><span class="glyphicon glyphicon-tasks"></span>List Backbone</a></li>
        <li><a href="show-circuit.php"><span class="glyphicon glyphicon-tasks"></span>List Circuit</a></li>     
     </ul>
    </li>
    
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-5">
        <span data-toggle="collapse" href="#sub-item-5" class="glyphicon glyphicon-th">
        </span>
        BTS
        <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-5">
        <li><a href="show-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>BTS Problem</a></li>
        <li><a href="show-history-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>History BTS Problem</a></li>
        <li><a href="show-bts.php"><span class="glyphicon glyphicon-tasks"></span>List BTS</a></li>
        <li><a href="show-device-bts.php"><span class="glyphicon glyphicon-tasks"></span>List Device BTS</a></li>       
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-13">
        <span data-toggle="collapse" href="#sub-item-13" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-13" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-13">
        <li><a href="show-ca-budget.php"><span class="glyphicon glyphicon-tasks"></span>CA Budget</a></li>
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
		<li><a href="show-ca-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Approval</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
		<li><a href="show-ca-report-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Report Approval</a></li>        
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-1">
        <span data-toggle="collapse" href="#sub-item-1" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-1">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
		<li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-11">
        <span data-toggle="collapse" href="#sub-item-11" class="glyphicon glyphicon-th">
        </span>
        DOMAIN
        <span data-toggle="collapse" href="#sub-item-11" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-11">
        <li><a href="show-domain.php"><span class="glyphicon glyphicon-tasks"></span>List Domain</a></li>        
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-2">
        <span data-toggle="collapse" href="#sub-item-2" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-2">
				<li><a href="show-asset.php"><span class="glyphicon glyphicon-tasks"></span>List Asset</a></li>
                <li><a href="show-asset-update.php"><span class="glyphicon glyphicon-tasks"></span>List Asset Update</a></li>
                <li><a href="show-barang.php"><span class="glyphicon glyphicon-tasks"></span>List Barang</a></li>
                <li><a href="show-barang-update.php"><span class="glyphicon glyphicon-tasks"></span>List Barang Update</a></li>
                <li><a href="show-consumable.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Masuk</a></li>
                <li><a href="show-consumable-keluar.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Keluar</a></li>
                <li><a href="show-item.php"><span class="glyphicon glyphicon-tasks"></span>List Item</a></li>
                <li><a href="show-tools.php"><span class="glyphicon glyphicon-tasks"></span>List Tools</a></li>
                <li><a href="show-tools-update.php"><span class="glyphicon glyphicon-tasks"></span>List Tools Update</a></li>
     </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-3">
        <span data-toggle="collapse" href="#sub-item-3" class="glyphicon glyphicon-th">
        </span>
        LAPORAN BARANG
        <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-3">
                <li><a href="show-laporan-asset-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Asset</a></li>
                <li><a href="show-laporan-barang-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang</a></li>
                <li><a href="show-laporan-barang-update-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang Update</a></li>             
                <li><a href="show-laporan-consumable-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Consumable</a></li>				  
				<li><a href="show-laporan-tools-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Tools</a></li>  
         </ul>
    </li>
	<li class="parent">
    <a data-toggle="collapse" href="#sub-item-17">
        <span data-toggle="collapse" href="#sub-item-17" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CA
        <span data-toggle="collapse" href="#sub-item-17" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-17">
				<li><a href="show-laporan-ca.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
				<li><a href="show-laporan-ca-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>CA Job to Do</a></li>
				<li><a href="show-laporan-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-4">
        <span data-toggle="collapse" href="#sub-item-4" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-4">
                <li><a href="show-laporan-customer-all.php"><span class="glyphicon glyphicon-tasks"></span>Customer</a></li>			
				<li><a href="show-laporan-job-to-do-all.php"><span class="glyphicon glyphicon-tasks"></span>Job to Do</a></li>				
                <li><a href="show-laporan-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li> 
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-10">
        <span data-toggle="collapse" href="#sub-item-10" class="glyphicon glyphicon-th">
        </span>
        LAPORAN ENGINEER
        <span data-toggle="collapse" href="#sub-item-10" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-10">
       <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
             <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI Engineer</a></li>     
             <li><a href="show-laporan-pekerjaan-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Pekerjaan Engineer</a></li>
         </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-7">
        <span data-toggle="collapse" href="#sub-item-7" class="glyphicon glyphicon-th">
        </span>
        LAPORAN NOC
        <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-7">
                <li><a href="show-laporan-circuit.php"><span class="glyphicon glyphicon-tasks"></span>Circuit Backbone</a></li>
        <li><a href="show-laporan-domain.php"><span class="glyphicon glyphicon-tasks"></span>Domain</a></li>
                <li><a href="show-laporan-backbone.php"><span class="glyphicon glyphicon-tasks"></span>SLA Backbone</a></li>
                <li><a href="show-laporan-sla-bts.php"><span class="glyphicon glyphicon-tasks"></span>SLA BTS</a></li>        
		<li><a href="show-chart.php"><span class="glyphicon glyphicon-tasks"></span>Chart Report</a></li>
         </ul>
    </li>

    <li class="active"><a href="show-engineer.php">User Account</a></li>
    <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
<?php } ?>
</ul>
</div><!--/.sidebar-->

