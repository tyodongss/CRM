<?php 
include ('koneksi.php');

$start = $_POST['start'];
$finish = $_POST['finish'];
$circuit = $_POST['circuit'];

if ($circuit!="ALL"){
$sql = "SELECT backbone_problem.id_backbone_problem, backbone_problem.swos, backbone_problem.id_circuit, backbone_problem.id_backbone, backbone_problem.description, backbone_problem.datetime_start, backbone_problem.datetime_end, backbone_problem.root_cause, backbone_problem.solved_after, backbone_problem.status_backbone_problem, circuit.nama_circuit, backbone.nama_backbone, timediff(datetime_end,datetime_start) as duration
              FROM backbone_problem, circuit, backbone
              WHERE backbone_problem.id_circuit = circuit.id_circuit
	AND circuit.nama_circuit='$circuit'
              AND backbone_problem.id_backbone = backbone.id_backbone
              AND datetime_start
              BETWEEN  '$start'
              AND  '$finish' order by datetime_start asc";
} else {
$sql = "SELECT backbone_problem.id_backbone_problem, backbone_problem.swos, backbone_problem.id_circuit, backbone_problem.id_backbone, backbone_problem.description, backbone_problem.datetime_start, backbone_problem.datetime_end, backbone_problem.root_cause, backbone_problem.solved_after, backbone_problem.status_backbone_problem, circuit.nama_circuit, backbone.nama_backbone, timediff(datetime_end,datetime_start) as duration
              FROM backbone_problem, circuit, backbone
              WHERE backbone_problem.id_circuit = circuit.id_circuit
              AND backbone_problem.id_backbone = backbone.id_backbone
              AND datetime_start
              BETWEEN  '$start'
              AND  '$finish' order by datetime_start asc";
}


$query = mysql_query($sql);
$query2 = mysql_query($sql);
$row = mysql_num_rows($query2);
?>
<form action="pdf.php" method="POST">
 
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
 <thead>
 <tr>
  <th data-field="itemid"  data-filter-control="input">No</th>
  <th data-field="swos"  data-filter-control="input">SWOS</th>
  <th data-field="nama_circuit"  data-filter-control="input">Nama Circuit</th>
  <th data-field="nama_backbone"  data-filter-control="input">Nama Backbone</th>
  <th data-field="description" data-filter-control="input">Description</th>
  <th data-field="datetime_start" data-filter-control="input">Date Time Start</th>
  <th data-field="datetime_end" data-filter-control="input">Date Time End</th>
  <th data-field="duration" data-sortable="true">Duration</th>
  <th data-field="root_cause"  data-filter-control="input">Root Cause</th>
  <th data-field="solved_after"  data-filter-control="input">Solved After</th>
  <th data-field="status_backbone_problem"  data-filter-control="input">Status Backbone Problem</th>

 </tr>
 </thead>
 <tbody>
<?php
$no=0;
while($record = mysql_fetch_array($query)){
?>
<tr>
  <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?>	<input type="hidden" value="<?php echo $no=$no+1;?>" name="no[]"></td>
  <td data-field="swos" data-sortable="true"><?php echo $record['swos'];?>	<input type="hidden" value="<?php echo $record['swos'];?>" name="swos[]"></td>
  <td data-field="nama_circuit" data-sortable="true"><?php echo $record['nama_circuit'];?>	<input type="hidden" value="<?php echo $record['nama_circuit'];?>" name="nama_circuit[]"></td>
  <td data-field="nama_backbone" data-sortable="true"><?php echo $record['nama_backbone'];?>	<input type="hidden" value="<?php echo $record['nama_backbone'];?>" name="nama_backbone"></td>
  <td data-field="description" data-sortable="true"><?php echo $record['description'];?>	<input type="hidden" value="<?php echo $record['description'];?>" name="description[]"></td>
  <td data-field="datetime_start" data-sortable="true"><?php echo $record['datetime_start'];?>	<input type="hidden" value="<?php echo $record['datetime_start'];?>" name="datetime_start[]"></td>
  <td data-field="datetime_end" data-sortable="true"><?php echo $record['datetime_end'];?>	<input type="hidden" value="<?php echo $record['datetime_end'];?>" name="datetime_end[]"></td>
  <td data-field="duration" data-sortable="true"><?php echo $record['duration'];?>		<input type="hidden" value="<?php echo $record['duration'];?>" name="duration[]"></td>
  <td data-field="root_cause" data-sortable="true"><?php echo $record['root_cause'];?>		<input type="hidden" value="<?php echo $record['root_cause'];?>" name="root_cause[]"></td>
  <td data-field="solved_after" data-sortable="true"><?php echo $record['solved_after'];?>	<input type="hidden" value="<?php echo $record['solved_after'];?>" name="solved_after[]"></td>
  <td data-field="status_backbone_problem" data-sortable="true"><?php echo $record['status_backbone_problem'];?>	<input type="hidden" value="<?php echo $record['status_backbone_problem'];?>" name="status_backbone_problem[]"></td>
 </tr>
<?php
}
?>

</tbody>
</table>

<input type="hidden" value="<?php print $_SESSION['nama_engineer']?>" name="nama_engineer">
<input type="hidden" value="<?php print $circuit ?>" name="circuit">
<input type="hidden" value="<?php print $row ?>" name="row">
<input type="hidden" value="<?php print $start ?>" name="rstart">
<input type="hidden" value="<?php print $finish ?>" name="rfinish">
<input type="submit" value="PDF">
</form>
