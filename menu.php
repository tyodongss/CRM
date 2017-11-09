<ul class="nav menu">
    <li class="active"><a href="dashboard.php">Dashboard</a></li>

<?php 
if ($_SESSION['role']=="administrator"){
?>
<!--li class="parent">
    <a data-toggle="collapse" href="#sub-item-1">
        <span data-toggle="collapse" href="#sub-item-1" class="glyphicon glyphicon-th">
        </span>
        BACKBONE
        <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-1">
        <li><a href="show-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem</a></li>
        <li><a href="show-history-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem History</a></li>
        <li><a href="show-traffic-usage.php"><span class="glyphicon glyphicon-tasks"></span>Traffic Usage</a></li>
        <li><a href="show-backbone.php"><span class="glyphicon glyphicon-tasks"></span>List Backbone</a></li>
        <li><a href="show-circuit.php"><span class="glyphicon glyphicon-tasks"></span>List Circuit</a></li>     
     </ul>
    </li>
    
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-2">
        <span data-toggle="collapse" href="#sub-item-2" class="glyphicon glyphicon-th">
        </span>
        BTS
        <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-2">
        <li><a href="show-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>BTS Problem</a></li>
        <li><a href="show-history-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>History BTS Problem</a></li>
        <li><a href="show-bts.php"><span class="glyphicon glyphicon-tasks"></span>List BTS</a></li>
        <li><a href="show-device-bts.php"><span class="glyphicon glyphicon-tasks"></span>List Device BTS</a></li>       
	<li><a href="show-data-ups.php"><span class="glyphicon glyphicon-tasks"></span>Management UPS BTS</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-3">
        <span data-toggle="collapse" href="#sub-item-3" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-3">
        <li><a href="show-ca-budget.php"><span class="glyphicon glyphicon-tasks"></span>CA Budget</a></li>
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Approval</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
        <li><a href="show-ca-report-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Report SPV</a></li>
		<li><a href="show-ca-report-approval-manager.php"><span class="glyphicon glyphicon-tasks"></span>CA Report Manager</a></li>    
     </ul>
    </li-->
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-4">
        <span data-toggle="collapse" href="#sub-item-4" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-4">        
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <!--li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li-->
     </ul>
    </li>
  
  <!--li class="parent">
    <a data-toggle="collapse" href="#sub-item-5">
        <span data-toggle="collapse" href="#sub-item-5" class="glyphicon glyphicon-th">
        </span>
        DOMAIN
        <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-5">
        <li><a href="show-domain.php"><span class="glyphicon glyphicon-tasks"></span>List Domain</a></li>        
     </ul>
    </li-->

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-6">
        <span data-toggle="collapse" href="#sub-item-6" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-6">
                <!--li><a href="show-barang-tracking.php"><span class="glyphicon glyphicon-tasks"></span>Equipment Tracking</a></li-->
                <!--li><a href="show-asset.php"><span class="glyphicon glyphicon-tasks"></span>List Asset</a></li-->
                <!--li><a href="show-asset-update.php"><span class="glyphicon glyphicon-tasks"></span>List Asset Update</a></li-->
				<li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer / Location</a></li>
				<li><a href="show-type.php"><span class="glyphicon glyphicon-tasks"></span>Type</a></li>
				<li><a href="show-model.php"><span class="glyphicon glyphicon-tasks"></span>Model</a></li>
				<li><a href="show-item.php"><span class="glyphicon glyphicon-tasks"></span>List Item</a></li>
                <!--li><a href="show-item-update.php"><span class="glyphicon glyphicon-tasks"></span>List Item Update</a></li>-->
				<!--li><a href="show-barang.php"><span class="glyphicon glyphicon-tasks"></span>List Barang</a></li>
                <li><a href="show-barang-update.php"><span class="glyphicon glyphicon-tasks"></span>List Barang Update</a></li-->
                <!--li><a href="show-consumable.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Masuk</a></li-->
                <!--li><a href="show-consumable-keluar.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Keluar</a></li-->
                <!--li><a href="show-item.php"><span class="glyphicon glyphicon-tasks"></span>List Item</a></li-->
                <!--li><a href="show-tools.php"><span class="glyphicon glyphicon-tasks"></span>List Tools</a></li-->
                <!--li><a href="show-tools-update.php"><span class="glyphicon glyphicon-tasks"></span>List Tools Update</a></li-->
     </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-7">
        <span data-toggle="collapse" href="#sub-item-7" class="glyphicon glyphicon-th">
        </span>
        REPORT
        <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-7">
                <li><a href="show-item-report.php"><span class="glyphicon glyphicon-tasks"></span>Item Report</a></li>
				<li><a href="show-daily-activity-report.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity Report</a></li>
				<li><a href="show-job-to-do-report.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Report</a></li>
				<!--li><a href="show-laporan-asset-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Asset</a></li>
                <li><a href="show-laporan-barang-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang</a></li>
                <li><a href="show-laporan-barang-update-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang Update</a></li>             
                <li><a href="show-laporan-consumable-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Consumable</a></li>                  
                <li><a href="show-laporan-tools-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Tools</a></li-->  
         </ul>
    </li>
    <!--li class="parent">
    <a data-toggle="collapse" href="#sub-item-8">
        <span data-toggle="collapse" href="#sub-item-8" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CA
        <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-8">
                <li><a href="show-laporan-ca.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
                <li><a href="show-laporan-ca-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>CA Job to Do</a></li>
                <li><a href="show-laporan-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-9">
        <span data-toggle="collapse" href="#sub-item-9" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-9" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-9">
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
    <a data-toggle="collapse" href="#sub-item-11">
        <span data-toggle="collapse" href="#sub-item-11" class="glyphicon glyphicon-th">
        </span>
        LAPORAN NOC
        <span data-toggle="collapse" href="#sub-item-11" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-11">
        <li><a href="show-laporan-circuit.php"><span class="glyphicon glyphicon-tasks"></span>Circuit Backbone</a></li>
        <li><a href="show-laporan-backbone.php"><span class="glyphicon glyphicon-tasks"></span>Backbone</a></li>
        <li><a href="show-laporan-domain.php"><span class="glyphicon glyphicon-tasks"></span>Domain</a></li>
        <li><a href="show-laporan-sla-backbone.php"><span class="glyphicon glyphicon-tasks"></span>SLA Backbone</a></li>
        <li><a href="show-laporan-sla-bts.php"><span class="glyphicon glyphicon-tasks"></span>SLA BTS</a></li>        
        <li><a href="show-chart.php"><span class="glyphicon glyphicon-tasks"></span>Chart Report</a></li>
         </ul>
    </li-->

     <li class="active"><a href="show-engineer.php">User Account</a></li>
     <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
     <li><a href="show-log.php">Log Access</a></li>
<?php } ?>
	
	
<?php 
if ($_SESSION['role']=="managertechnicalservices"){
?>
<!--li class="parent">
    <a data-toggle="collapse" href="#sub-item-1">
        <span data-toggle="collapse" href="#sub-item-1" class="glyphicon glyphicon-th">
        </span>
        BACKBONE
        <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-1">
        <li><a href="show-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem</a></li>
        <li><a href="show-history-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem History</a></li>
        <li><a href="show-traffic-usage.php"><span class="glyphicon glyphicon-tasks"></span>Traffic Usage</a></li>
        <li><a href="show-backbone.php"><span class="glyphicon glyphicon-tasks"></span>List Backbone</a></li>
        <li><a href="show-circuit.php"><span class="glyphicon glyphicon-tasks"></span>List Circuit</a></li>     
     </ul>
    </li>
    
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-2">
        <span data-toggle="collapse" href="#sub-item-2" class="glyphicon glyphicon-th">
        </span>
        BTS
        <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-2">
        <li><a href="show-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>BTS Problem</a></li>
        <li><a href="show-history-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>History BTS Problem</a></li>
        <li><a href="show-bts.php"><span class="glyphicon glyphicon-tasks"></span>List BTS</a></li>
        <li><a href="show-device-bts.php"><span class="glyphicon glyphicon-tasks"></span>List Device BTS</a></li>       
	<li><a href="show-data-ups.php"><span class="glyphicon glyphicon-tasks"></span>Management UPS BTS</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-3">
        <span data-toggle="collapse" href="#sub-item-3" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-3">
        <li><a href="show-ca-budget.php"><span class="glyphicon glyphicon-tasks"></span>CA Budget</a></li>
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Approval</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
        <li><a href="show-ca-report-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Report SPV</a></li>
		<li><a href="show-ca-report-approval-manager.php"><span class="glyphicon glyphicon-tasks"></span>CA Report Manager</a></li>    
     </ul>
    </li-->
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-4">
        <span data-toggle="collapse" href="#sub-item-4" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-4">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <!--li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li-->
     </ul>
    </li>
  
  <!--li class="parent">
    <a data-toggle="collapse" href="#sub-item-5">
        <span data-toggle="collapse" href="#sub-item-5" class="glyphicon glyphicon-th">
        </span>
        DOMAIN
        <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-5">
        <li><a href="show-domain.php"><span class="glyphicon glyphicon-tasks"></span>List Domain</a></li>        
     </ul>
    </li-->

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-6">
        <span data-toggle="collapse" href="#sub-item-6" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-6" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-6">
                <!--li><a href="show-barang-tracking.php"><span class="glyphicon glyphicon-tasks"></span>Equipment Tracking</a></li-->
                <!--li><a href="show-asset.php"><span class="glyphicon glyphicon-tasks"></span>List Asset</a></li-->
                <!--li><a href="show-asset-update.php"><span class="glyphicon glyphicon-tasks"></span>List Asset Update</a></li-->
                <li><a href="show-barang.php"><span class="glyphicon glyphicon-tasks"></span>List Barang</a></li>
                <li><a href="show-barang-update.php"><span class="glyphicon glyphicon-tasks"></span>List Barang Update</a></li>
                <!--li><a href="show-consumable.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Masuk</a></li-->
                <!--li><a href="show-consumable-keluar.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Keluar</a></li-->
                <!--li><a href="show-item.php"><span class="glyphicon glyphicon-tasks"></span>List Item</a></li-->
                <!--li><a href="show-tools.php"><span class="glyphicon glyphicon-tasks"></span>List Tools</a></li-->
                <!--li><a href="show-tools-update.php"><span class="glyphicon glyphicon-tasks"></span>List Tools Update</a></li-->
     </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-7">
        <span data-toggle="collapse" href="#sub-item-7" class="glyphicon glyphicon-th">
        </span>
        LAPORAN BARANG
        <span data-toggle="collapse" href="#sub-item-7" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-7">
                <li><a href="show-laporan-asset-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Asset</a></li>
                <li><a href="show-laporan-barang-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang</a></li>
                <li><a href="show-laporan-barang-update-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang Update</a></li>             
                <li><a href="show-laporan-consumable-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Consumable</a></li>                  
                <li><a href="show-laporan-tools-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Tools</a></li>  
         </ul>
    </li>
    <!--li class="parent">
    <a data-toggle="collapse" href="#sub-item-8">
        <span data-toggle="collapse" href="#sub-item-8" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CA
        <span data-toggle="collapse" href="#sub-item-8" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-8">
                <li><a href="show-laporan-ca.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
                <li><a href="show-laporan-ca-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>CA Job to Do</a></li>
                <li><a href="show-laporan-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-9">
        <span data-toggle="collapse" href="#sub-item-9" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-9" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-9">
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
    <a data-toggle="collapse" href="#sub-item-11">
        <span data-toggle="collapse" href="#sub-item-11" class="glyphicon glyphicon-th">
        </span>
        LAPORAN NOC
        <span data-toggle="collapse" href="#sub-item-11" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-11">
        <li><a href="show-laporan-circuit.php"><span class="glyphicon glyphicon-tasks"></span>Circuit Backbone</a></li>
        <li><a href="show-laporan-backbone.php"><span class="glyphicon glyphicon-tasks"></span>Backbone</a></li>
        <li><a href="show-laporan-domain.php"><span class="glyphicon glyphicon-tasks"></span>Domain</a></li>
        <li><a href="show-laporan-sla-backbone.php"><span class="glyphicon glyphicon-tasks"></span>SLA Backbone</a></li>
        <li><a href="show-laporan-sla-bts.php"><span class="glyphicon glyphicon-tasks"></span>SLA BTS</a></li>        
        <li><a href="show-chart.php"><span class="glyphicon glyphicon-tasks"></span>Chart Report</a></li>
         </ul>
    </li-->

     <li class="active"><a href="show-engineer.php">User Account</a></li>
     <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
     <li><a href="show-log.php">Log Access</a></li>
<?php } ?>

<?php 
if ($_SESSION['role']=="assistantmanagertechnicalservices"){
?>
<li class="parent">
    <a data-toggle="collapse" href="#sub-item-12">
        <span data-toggle="collapse" href="#sub-item-12" class="glyphicon glyphicon-th">
        </span>
        BACKBONE
        <span data-toggle="collapse" href="#sub-item-12" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-12">
        <li><a href="show-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem</a></li>
        <li><a href="show-history-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem History</a></li>
        <li><a href="show-traffic-usage.php"><span class="glyphicon glyphicon-tasks"></span>Traffic Usage</a></li>
        <li><a href="show-backbone.php"><span class="glyphicon glyphicon-tasks"></span>List Backbone</a></li>
        <li><a href="show-circuit.php"><span class="glyphicon glyphicon-tasks"></span>List Circuit</a></li>     
     </ul>
    </li>
    
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-13">
        <span data-toggle="collapse" href="#sub-item-13" class="glyphicon glyphicon-th">
        </span>
        BTS
        <span data-toggle="collapse" href="#sub-item-13" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-13">
        <li><a href="show-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>BTS Problem</a></li>
        <li><a href="show-history-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>History BTS Problem</a></li>
        <li><a href="show-bts.php"><span class="glyphicon glyphicon-tasks"></span>List BTS</a></li>
        <li><a href="show-device-bts.php"><span class="glyphicon glyphicon-tasks"></span>List Device BTS</a></li>       
     </ul>
    </li>
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
        <li><a href="show-ca-budget.php"><span class="glyphicon glyphicon-tasks"></span>CA Budget</a></li>
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>        
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-15">
        <span data-toggle="collapse" href="#sub-item-15" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-15" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-15">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-16">
        <span data-toggle="collapse" href="#sub-item-16" class="glyphicon glyphicon-th">
        </span>
        DOMAIN
        <span data-toggle="collapse" href="#sub-item-16" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-16">
        <li><a href="show-domain.php"><span class="glyphicon glyphicon-tasks"></span>List Domain</a></li>        
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-17">
        <span data-toggle="collapse" href="#sub-item-17" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-17" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-17">
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
    <a data-toggle="collapse" href="#sub-item-18">
        <span data-toggle="collapse" href="#sub-item-18" class="glyphicon glyphicon-th">
        </span>
        LAPORAN BARANG
        <span data-toggle="collapse" href="#sub-item-18" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-18">
                <li><a href="show-laporan-asset-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Asset</a></li>
                <li><a href="show-laporan-barang-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang</a></li>
                <li><a href="show-laporan-barang-update-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang Update</a></li>             
                <li><a href="show-laporan-consumable-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Consumable</a></li>                  
                <li><a href="show-laporan-tools-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Tools</a></li>  
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-19">
        <span data-toggle="collapse" href="#sub-item-19" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CA
        <span data-toggle="collapse" href="#sub-item-19" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-19">
                <li><a href="show-laporan-ca.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
                <li><a href="show-laporan-ca-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>CA Job to Do</a></li>
                <li><a href="show-laporan-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-20">
        <span data-toggle="collapse" href="#sub-item-20" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-20" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-20">
                <li><a href="show-laporan-customer-all.php"><span class="glyphicon glyphicon-tasks"></span>Customer</a></li>            
                <li><a href="show-laporan-job-to-do-all.php"><span class="glyphicon glyphicon-tasks"></span>Job to Do</a></li>              
                <li><a href="show-laporan-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li> 
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-21">
        <span data-toggle="collapse" href="#sub-item-21" class="glyphicon glyphicon-th">
        </span>
        LAPORAN ENGINEER
        <span data-toggle="collapse" href="#sub-item-21" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-21">
       <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
             <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI Engineer</a></li>     
             <li><a href="show-laporan-pekerjaan-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Pekerjaan Engineer</a></li>
         </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-22">
        <span data-toggle="collapse" href="#sub-item-22" class="glyphicon glyphicon-th">
        </span>
        LAPORAN NOC
        <span data-toggle="collapse" href="#sub-item-22" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-22">
                <li><a href="show-laporan-circuit.php"><span class="glyphicon glyphicon-tasks"></span>Circuit Backbone</a></li>
        <li><a href="show-laporan-domain.php"><span class="glyphicon glyphicon-tasks"></span>Domain</a></li>
                <li><a href="show-laporan-sla-backbone.php"><span class="glyphicon glyphicon-tasks"></span>SLA Backbone</a></li>
                <li><a href="show-laporan-sla-bts.php"><span class="glyphicon glyphicon-tasks"></span>SLA BTS</a></li>        
        <li><a href="show-chart.php"><span class="glyphicon glyphicon-tasks"></span>Chart Report</a></li>
         </ul>
    </li>

    <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
<?php } ?>

<?php 
if ($_SESSION['role']=="supervisornoc"){
?>
<li class="parent">
    <a data-toggle="collapse" href="#sub-item-23">
        <span data-toggle="collapse" href="#sub-item-23" class="glyphicon glyphicon-th">
        </span>
        BACKBONE
        <span data-toggle="collapse" href="#sub-item-23" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-23">
        <li><a href="show-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem</a></li>
        <li><a href="show-history-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem History</a></li>
        <li><a href="show-traffic-usage.php"><span class="glyphicon glyphicon-tasks"></span>Traffic Usage</a></li>
        <li><a href="show-backbone.php"><span class="glyphicon glyphicon-tasks"></span>List Backbone</a></li>
        <li><a href="show-circuit.php"><span class="glyphicon glyphicon-tasks"></span>List Circuit</a></li>     
     </ul>
    </li>
    
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-24">
        <span data-toggle="collapse" href="#sub-item-24" class="glyphicon glyphicon-th">
        </span>
        BTS
        <span data-toggle="collapse" href="#sub-item-24" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-24">
        <li><a href="show-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>BTS Problem</a></li>
        <li><a href="show-history-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>History BTS Problem</a></li>
        <li><a href="show-bts.php"><span class="glyphicon glyphicon-tasks"></span>List BTS</a></li>
        <li><a href="show-device-bts.php"><span class="glyphicon glyphicon-tasks"></span>List Device BTS</a></li>       
        <li><a href="show-data-ups.php"><span class="glyphicon glyphicon-tasks"></span>Management UPS BTS</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-25">
        <span data-toggle="collapse" href="#sub-item-25" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-25" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-25">
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
		<li><a href="show-ca-report-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Report SPV</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-26">
        <span data-toggle="collapse" href="#sub-item-26" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-26" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-26">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-27">
        <span data-toggle="collapse" href="#sub-item-27" class="glyphicon glyphicon-th">
        </span>
        DOMAIN
        <span data-toggle="collapse" href="#sub-item-27" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-27">
        <li><a href="show-domain.php"><span class="glyphicon glyphicon-tasks"></span>List Domain</a></li>        
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-28">
        <span data-toggle="collapse" href="#sub-item-28" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-28" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-28">
                <li><a href="show-laporan-customer-all.php"><span class="glyphicon glyphicon-tasks"></span>Customer</a></li>            
                <li><a href="show-laporan-job-to-do-all.php"><span class="glyphicon glyphicon-tasks"></span>Job to Do</a></li>              
                <li><a href="show-laporan-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li> 
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-29">
        <span data-toggle="collapse" href="#sub-item-29" class="glyphicon glyphicon-th">
        </span>
        LAPORAN ENGINEER
        <span data-toggle="collapse" href="#sub-item-29" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-29">
       <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
             <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI Engineer</a></li>
             <li><a href="show-laporan-pekerjaan-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Pekerjaan Engineer</a></li>
         </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-30">
        <span data-toggle="collapse" href="#sub-item-30" class="glyphicon glyphicon-th">
        </span>
        LAPORAN NOC
        <span data-toggle="collapse" href="#sub-item-30" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-30">
                <li><a href="show-laporan-circuit.php"><span class="glyphicon glyphicon-tasks"></span>Circuit Backbone</a></li>
                <li><a href="show-laporan-domain.php"><span class="glyphicon glyphicon-tasks"></span>Domain</a></li>
                <li><a href="show-laporan-sla-backbone.php"><span class="glyphicon glyphicon-tasks"></span>SLA Backbone</a></li>
                <li><a href="show-laporan-sla-bts.php"><span class="glyphicon glyphicon-tasks"></span>SLA BTS</a></li>        
                <li><a href="show-chart.php"><span class="glyphicon glyphicon-tasks"></span>Chart Report</a></li>
         </ul>
    </li>

     <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
<li><a href="proses-dev.php?menu=role">Developer Session</a></li>
<li><a href="show-log.php">Log Access</a></li>

<?php } ?>

<?php 
if ($_SESSION['role']=="noc"){
?>
<li class="parent">
    <a data-toggle="collapse" href="#sub-item-31">
        <span data-toggle="collapse" href="#sub-item-31" class="glyphicon glyphicon-th">
        </span>
        BACKBONE
        <span data-toggle="collapse" href="#sub-item-31" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-31">
        <li><a href="show-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem</a></li>
        <li><a href="show-history-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem History</a></li>
        <li><a href="show-traffic-usage.php"><span class="glyphicon glyphicon-tasks"></span>Traffic Usage</a></li>
        <li><a href="show-backbone.php"><span class="glyphicon glyphicon-tasks"></span>List Backbone</a></li>
        <li><a href="show-circuit.php"><span class="glyphicon glyphicon-tasks"></span>List Circuit</a></li>     
     </ul>
    </li>
    
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-32">
        <span data-toggle="collapse" href="#sub-item-32" class="glyphicon glyphicon-th">
        </span>
        BTS
        <span data-toggle="collapse" href="#sub-item-32" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-32">
        <li><a href="show-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>BTS Problem</a></li>
        <li><a href="show-history-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>History BTS Problem</a></li>
        <li><a href="show-bts.php"><span class="glyphicon glyphicon-tasks"></span>List BTS</a></li>
        <li><a href="show-device-bts.php"><span class="glyphicon glyphicon-tasks"></span>List Device BTS</a></li>       
	<li><a href="show-data-ups.php"><span class="glyphicon glyphicon-tasks"></span>Management UPS BTS</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-33">
        <span data-toggle="collapse" href="#sub-item-33" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-33" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-33">
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>        
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-34">
        <span data-toggle="collapse" href="#sub-item-34" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-34" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-34">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-35">
        <span data-toggle="collapse" href="#sub-item-35" class="glyphicon glyphicon-th">
        </span>
        DOMAIN
        <span data-toggle="collapse" href="#sub-item-35" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-35">
        <li><a href="show-domain.php"><span class="glyphicon glyphicon-tasks"></span>List Domain</a></li>        
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-36">
        <span data-toggle="collapse" href="#sub-item-36" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-36" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-36">
                <li><a href="show-laporan-customer-all.php"><span class="glyphicon glyphicon-tasks"></span>Customer</a></li>            
                <li><a href="show-laporan-job-to-do-all.php"><span class="glyphicon glyphicon-tasks"></span>Job to Do</a></li>              
                <li><a href="show-laporan-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li> 
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-37">
        <span data-toggle="collapse" href="#sub-item-37" class="glyphicon glyphicon-th">
        </span>
        LAPORAN ENGINEER
        <span data-toggle="collapse" href="#sub-item-37" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-37">
       <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
             <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI Engineer</a></li>
             <li><a href="show-laporan-pekerjaan-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Pekerjaan Engineer</a></li>
         </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-38">
        <span data-toggle="collapse" href="#sub-item-38" class="glyphicon glyphicon-th">
        </span>
        LAPORAN NOC
        <span data-toggle="collapse" href="#sub-item-38" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-38">
                <li><a href="show-laporan-circuit.php"><span class="glyphicon glyphicon-tasks"></span>Circuit Backbone</a></li>
                <li><a href="show-laporan-domain.php"><span class="glyphicon glyphicon-tasks"></span>Domain</a></li>
                <li><a href="show-laporan-sla-backbone.php"><span class="glyphicon glyphicon-tasks"></span>SLA Backbone</a></li>
                <li><a href="show-laporan-sla-bts.php"><span class="glyphicon glyphicon-tasks"></span>SLA BTS</a></li>        
                <li><a href="show-chart.php"><span class="glyphicon glyphicon-tasks"></span>Chart Report</a></li>
         </ul>
    </li>
     <li class="active"><a href="show-notification.php">Helpdesk Notification</a></li>
     <li class="active"><a href="show-engineer.php">User Account</a></li>
     <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
<li><a href="proses-dev.php?menu=role">Developer Session</a></li>
<li><a href="show-log.php">Log Access</a></li>
<?php } ?>

<?php 
if ($_SESSION['role']=="supervisorengineering"){
?>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-39">
        <span data-toggle="collapse" href="#sub-item-39" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-39" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-39">
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
		<li><a href="show-ca-report-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Report SPV</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-40">
        <span data-toggle="collapse" href="#sub-item-40" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-40" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-40">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-41">
        <span data-toggle="collapse" href="#sub-item-41" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-41" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-41">
            <li><a href="show-laporan-customer-all.php"><span class="glyphicon glyphicon-tasks"></span>Customer</a></li>            
            <li><a href="show-laporan-job-to-do-all.php"><span class="glyphicon glyphicon-tasks"></span>Job to Do</a></li>              
            <li><a href="show-laporan-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li> 
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-42">
        <span data-toggle="collapse" href="#sub-item-42" class="glyphicon glyphicon-th">
        </span>
        LAPORAN ENGINEER
        <span data-toggle="collapse" href="#sub-item-42" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-42">
       <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
             <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI Engineer</a></li>
             <li><a href="show-laporan-pekerjaan-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Pekerjaan Engineer</a></li>
         </ul>
    </li>
	
	<li class="active"><a href="show-vendor.php">Vendor Database</a></li>

<?php } ?>

<?php 
if ($_SESSION['role']=="engineer"){
?>
  <!--li class="parent">
    <a data-toggle="collapse" href="#sub-item-43">
        <span data-toggle="collapse" href="#sub-item-43" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-43" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-43">
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>        
     </ul>
    </li-->
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-44">
        <span data-toggle="collapse" href="#sub-item-44" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-44" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-44">
        <!--li><a href="show-data-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li-->
        <li><a href="show-daily-activity-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
     </ul>
    </li>
  
<?php } ?>

<?php 
if ($_SESSION['role']=="supervisorvsat"){
?>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-45">
        <span data-toggle="collapse" href="#sub-item-45" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-45" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-45">
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li> 
		<li><a href="show-ca-report-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Report SPV</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-46">
        <span data-toggle="collapse" href="#sub-item-46" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-46" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-46">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-47">
        <span data-toggle="collapse" href="#sub-item-47" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-47" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-47">
                <li><a href="show-laporan-customer-all.php"><span class="glyphicon glyphicon-tasks"></span>Customer</a></li>            
                <li><a href="show-laporan-job-to-do-all.php"><span class="glyphicon glyphicon-tasks"></span>Job to Do</a></li>              
                <li><a href="show-laporan-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li> 
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-48">
        <span data-toggle="collapse" href="#sub-item-48" class="glyphicon glyphicon-th">
        </span>
        LAPORAN ENGINEER
        <span data-toggle="collapse" href="#sub-item-48" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-48">
       <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
             <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI Engineer</a></li>
             <li><a href="show-laporan-pekerjaan-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Pekerjaan Engineer</a></li>
         </ul>
    </li>

<?php } ?>

<?php 
if ($_SESSION['role']=="engineervsat"){
?>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-49">
        <span data-toggle="collapse" href="#sub-item-49" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-49" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-49">
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>        
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-50">
        <span data-toggle="collapse" href="#sub-item-50" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-50" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-50">
        <li><a href="show-data-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
     </ul>
    </li>
  
<?php } ?>

<?php 
if ($_SESSION['role']=="supervisortechnicalsupport"){
?>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-51">
        <span data-toggle="collapse" href="#sub-item-51" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-51" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-51">
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
		<li><a href="show-ca-report-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Report SPV</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-52">
        <span data-toggle="collapse" href="#sub-item-52" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-52" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-52">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-63">
        <span data-toggle="collapse" href="#sub-item-63" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-63" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>    
        <li><a href="show-barang.php"><span class="glyphicon glyphicon-tasks"></span>List Barang</a></li>
        <li><a href="show-barang-update.php"><span class="glyphicon glyphicon-tasks"></span>List Barang Update</a></li>
        <li><a href="show-consumable.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Masuk</a></li>
        <li><a href="show-consumable-keluar.php"><span class="glyphicon glyphicon-tasks"></span>List Consumable Keluar</a></li>                       
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-53">
        <span data-toggle="collapse" href="#sub-item-53" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-53" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-53">
                <li><a href="show-laporan-customer-all.php"><span class="glyphicon glyphicon-tasks"></span>Customer</a></li>            
                <li><a href="show-laporan-job-to-do-all.php"><span class="glyphicon glyphicon-tasks"></span>Job to Do</a></li>              
                <li><a href="show-laporan-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li> 
		<li><a href="show-laporan-sla-backbone.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem</a></li>
		<li><a href="show-laporan-sla-bts.php"><span class="glyphicon glyphicon-tasks"></span>BTS Problem</a></li>
		
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-54">
        <span data-toggle="collapse" href="#sub-item-54" class="glyphicon glyphicon-th">
        </span>
        LAPORAN ENGINEER
        <span data-toggle="collapse" href="#sub-item-54" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-54">
       <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
             <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI Engineer</a></li>
             <li><a href="show-laporan-pekerjaan-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Pekerjaan Engineer</a></li>
         </ul>
    </li>
    <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
<?php } ?>

<?php 
if ($_SESSION['role']=="technicalsupport"){
?>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-55">
        <span data-toggle="collapse" href="#sub-item-55" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-55" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-55">
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>        
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-56">
        <span data-toggle="collapse" href="#sub-item-56" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-56" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-56">
        <li><a href="show-data-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-it-outsource-support.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
        <li><a href="show-job-to-do-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
     </ul>
    </li>
  
<?php } ?>

<?php 
if ($_SESSION['role']=="helpdesk"){
?>
<li class="parent">
    <a data-toggle="collapse" href="#sub-item-57">
        <span data-toggle="collapse" href="#sub-item-57" class="glyphicon glyphicon-th">
        </span>
        BACKBONE
        <span data-toggle="collapse" href="#sub-item-57" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-57">
        <li><a href="show-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem</a></li>
        <li><a href="show-history-backbone-problem.php"><span class="glyphicon glyphicon-tasks"></span>Backbone Problem History</a></li>
        <li><a href="show-traffic-usage.php"><span class="glyphicon glyphicon-tasks"></span>Traffic Usage</a></li>
        <li><a href="show-backbone.php"><span class="glyphicon glyphicon-tasks"></span>List Backbone</a></li>
        <li><a href="show-circuit.php"><span class="glyphicon glyphicon-tasks"></span>List Circuit</a></li>     
     </ul>
    </li>
    
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-58">
        <span data-toggle="collapse" href="#sub-item-58" class="glyphicon glyphicon-th">
        </span>
        BTS
        <span data-toggle="collapse" href="#sub-item-58" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-58">
        <li><a href="show-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>BTS Problem</a></li>
        <li><a href="show-history-bts-problem.php"><span class="glyphicon glyphicon-tasks"></span>History BTS Problem</a></li>
        <li><a href="show-bts.php"><span class="glyphicon glyphicon-tasks"></span>List BTS</a></li>
        <li><a href="show-device-bts.php"><span class="glyphicon glyphicon-tasks"></span>List Device BTS</a></li>       
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-59">
        <span data-toggle="collapse" href="#sub-item-59" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-59" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-59">
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>        
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-60">
        <span data-toggle="collapse" href="#sub-item-60" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-60" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-60">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
     </ul>
    </li>

<?php } ?>

<?php 
if ($_SESSION['role']=="managerfinanceaccounting"){
?>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-61">
        <span data-toggle="collapse" href="#sub-item-61" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-61" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-61">
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
    <a data-toggle="collapse" href="#sub-item-62">
        <span data-toggle="collapse" href="#sub-item-62" class="glyphicon glyphicon-th">
        </span>
        LAPORAN BARANG
        <span data-toggle="collapse" href="#sub-item-62" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-62">
                <li><a href="show-laporan-asset-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Asset</a></li>
                <li><a href="show-laporan-barang-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang</a></li>
                <li><a href="show-laporan-barang-update-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang Update</a></li>             
                <li><a href="show-laporan-consumable-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Consumable</a></li>                  
                <li><a href="show-laporan-tools-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Tools</a></li>  
         </ul>
    </li>
   
    <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
<?php } ?>

<?php 
if ($_SESSION['role']=="warehouse"){
?>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-63">
        <span data-toggle="collapse" href="#sub-item-63" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-63" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-63">
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
    <a data-toggle="collapse" href="#sub-item-64">
        <span data-toggle="collapse" href="#sub-item-64" class="glyphicon glyphicon-th">
        </span>
        LAPORAN BARANG
        <span data-toggle="collapse" href="#sub-item-64" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-64">
                <li><a href="show-laporan-asset-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Asset</a></li>
                <li><a href="show-laporan-barang-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang</a></li>
                <li><a href="show-laporan-barang-update-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang Update</a></li>             
                <li><a href="show-laporan-consumable-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Consumable</a></li>                  
                <li><a href="show-laporan-tools-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Tools</a></li>  
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-33">
        <span data-toggle="collapse" href="#sub-item-33" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-33" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-33">
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
     </ul>
    </li>
 
    <li class="active"><a href="show-vendor.php">Vendor Database</a></li>
<?php } ?>

<?php 
if ($_SESSION['role']=="paa"){
?>

<li class="parent">
    <a data-toggle="collapse" href="#sub-item-65">
        <span data-toggle="collapse" href="#sub-item-65" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-65" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-65">
        <li><a href="show-ca-budget.php"><span class="glyphicon glyphicon-tasks"></span>CA Budget</a></li>
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>  
     </ul>
    </li>
    
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-66">
        <span data-toggle="collapse" href="#sub-item-66" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-66" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-66">
        <li><a href="show-data-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-job-to-do-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>

     </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-67">
        <span data-toggle="collapse" href="#sub-item-67" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CA
        <span data-toggle="collapse" href="#sub-item-67" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-67">
                <li><a href="show-laporan-ca.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
                <li><a href="show-laporan-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
                <li><a href="show-laporan-ca-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>CA Job to Do</a></li>
         </ul>
    </li>
	
	<li class="parent">
    <a data-toggle="collapse" href="#sub-item-63">
        <span data-toggle="collapse" href="#sub-item-63" class="glyphicon glyphicon-th">
        </span>
        INVENTORY
        <span data-toggle="collapse" href="#sub-item-63" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-63">
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
    <a data-toggle="collapse" href="#sub-item-64">
        <span data-toggle="collapse" href="#sub-item-64" class="glyphicon glyphicon-th">
        </span>
        LAPORAN BARANG
        <span data-toggle="collapse" href="#sub-item-64" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-64">
                <li><a href="show-laporan-asset-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Asset</a></li>
                <li><a href="show-laporan-barang-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang</a></li>
                <li><a href="show-laporan-barang-update-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Barang Update</a></li>             
                <li><a href="show-laporan-consumable-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Consumable</a></li>                  
                <li><a href="show-laporan-tools-all.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Tools</a></li>  
         </ul>
    </li>
    
<?php } ?>

<?php
if ($_SESSION['role']=="sales"){
?>
<li class="parent">
    <a data-toggle="collapse" href="#sub-item-68">
        <span data-toggle="collapse" href="#sub-item-68" class="glyphicon glyphicon-th">
        </span>
        DOMAIN
        <span data-toggle="collapse" href="#sub-item-68" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-68">
        <li><a href="show-domain.php"><span class="glyphicon glyphicon-tasks"></span>List Domain</a></li>
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-69">
        <span data-toggle="collapse" href="#sub-item-69" class="glyphicon glyphicon-th">
        </span>
        CUSTOMER
        <span data-toggle="collapse" href="#sub-item-69" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-69">
        <li><a href="show-customer-sales.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
     </ul>
    </li>

    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-70">
        <span data-toggle="collapse" href="#sub-item-70" class="glyphicon glyphicon-th">
        </span>
        LAPORAN
        <span data-toggle="collapse" href="#sub-item-70" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-70">
        <li><a href="show-laporan-customer.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Customer</a></li>
        <li><a href="show-laporan-domain.php"><span class="glyphicon glyphicon-tasks"></span>Laporan Domain Expired</a></li>
     </ul>
    </li>
    
<?php } ?>

<?php 
if ($_SESSION['role']=="supervisortechnicalsupportjkt"){
?>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-71">
        <span data-toggle="collapse" href="#sub-item-71" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-71" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-71">
        <li><a href="show-ca-request.php"><span class="glyphicon glyphicon-tasks"></span>CA Request</a></li>
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>
		<li><a href="show-ca-report-approval.php"><span class="glyphicon glyphicon-tasks"></span>CA Report SPV</a></li>
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-72">
        <span data-toggle="collapse" href="#sub-item-72" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-72" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-72">
        <li><a href="show-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-job-to-do.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
        <li><a href="show-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
     </ul>
    </li>
  
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-73">
        <span data-toggle="collapse" href="#sub-item-73" class="glyphicon glyphicon-th">
        </span>
        LAPORAN CRM
        <span data-toggle="collapse" href="#sub-item-73" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-73">
                <li><a href="show-laporan-customer-all.php"><span class="glyphicon glyphicon-tasks"></span>Customer</a></li>            
                <li><a href="show-laporan-job-to-do-all.php"><span class="glyphicon glyphicon-tasks"></span>Job to Do</a></li>              
                <li><a href="show-laporan-it-outsource.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li> 
         </ul>
    </li>
    <li class="parent">
    <a data-toggle="collapse" href="#sub-item-74">
        <span data-toggle="collapse" href="#sub-item-74" class="glyphicon glyphicon-th">
        </span>
        LAPORAN ENGINEER
        <span data-toggle="collapse" href="#sub-item-74" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-74">
       <li><a href="show-laporan-daily-activity.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
             <li><a href="show-laporan-kpi-engineer.php"><span class="glyphicon glyphicon-tasks"></span>KPI Engineer</a></li>
             <li><a href="show-laporan-pekerjaan-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Pekerjaan Engineer</a></li>
         </ul>
    </li>

<?php } ?>

<?php 
if ($_SESSION['role']=="technicalsupportjkt"){
?>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-75">
        <span data-toggle="collapse" href="#sub-item-75" class="glyphicon glyphicon-th">
        </span>
        CA
        <span data-toggle="collapse" href="#sub-item-75" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-75">
        <li><a href="show-ca-report.php"><span class="glyphicon glyphicon-tasks"></span>CA Report</a></li>        
     </ul>
    </li>
  <li class="parent">
    <a data-toggle="collapse" href="#sub-item-76">
        <span data-toggle="collapse" href="#sub-item-76" class="glyphicon glyphicon-th">
        </span>
        CRM
        <span data-toggle="collapse" href="#sub-item-76" class="icon pull-right">
        <em class="glyphicon glyphicon-s glyphicon-plus"></em>
        </span>
    </a>
     <ul class="children collapse" id="sub-item-76">
        <li><a href="show-data-customer.php"><span class="glyphicon glyphicon-tasks"></span>Customer Database</a></li>
        <li><a href="show-daily-activity-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Daily Activity</a></li>
        <li><a href="show-it-outsource-support.php"><span class="glyphicon glyphicon-tasks"></span>IT Outsource</a></li>
        <li><a href="show-job-to-do-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do</a></li>
        <li><a href="show-job-to-do-update-engineer.php"><span class="glyphicon glyphicon-tasks"></span>Job To Do Update</a></li>
     </ul>
    </li>
  
<?php } ?>
</ul>
</div><!--/.sidebar-->


