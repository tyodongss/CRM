<table border=1>
<thead>
<tr>
        <th data-field="itemid" data-sortable="true">No</th>
        <th data-field="nama_circuit"  data-sortable="true">Circuit ID</th>
        <th data-field="period" data-sortable="true">Periode Report</th>
        <th data-field="kpi_down" data-sortable="true">KPI Down</th>
        <th data-field="kpi_intermittent" data-sortable="true">KPI Intermittent</th>
        <th data-field="sla_down" data-sortable="true">SLA Value</th>
        <th data-field="rebuild"></th>
</tr>
</thead>
<tbody>
<?php
include "koneksi.php";
$circuit = mysql_query("select * from circuit");
$no=0;
while($record = mysql_fetch_array($circuit)){

$id = $record['id_circuit'];
$span = mysql_num_rows(mysql_query("select id_history from backbone_history where id_circuit='$id' order by id_bulan desc"));

?>
        <tr>
                <td data-field="itemid" data-sortable="true" rowspan="<?php print $span ?>">
                        <?php echo $no=$no+1;?>
                </td>
                <td data-field="nama_circuit" data-sortable="true" rowspan="<?php print $span ?>">
                        <?php
                        $id = $record['id_circuit'];
                        print $record['nama_circuit'];
                        ?>
                        <input type="hidden" name="nama_circuit[]" value="<?php print $record['nama_circuit'] ?>">
        	</td>
        <?php
        $sql = mysql_query("select * from backbone_history where id_circuit='$id' order by id_bulan desc");
        $row = mysql_num_rows($sql);
        while ($record2=mysql_fetch_array($sql)){
        ?>
                <td data-field="period" data-sortable="true"><?php print $record2['id_bulan']."-".$record2['id_tahun'] ?></td>
                <td data-field="kpi_down" data-sortable="true"><?php print $record2['kpi_down']?></td>
                <td data-field="kpi_intermittent" data-sortable="true"><?php print $record2['kpi_intermittent'] ?></td>
                <td data-field="sla_down" data-sortable="true"><?php print $record2['sla_down'] ?></td>
		<td data-field="rebuild">
			<form action="proses-rebuild-history-backbone-problem.php" method="GET">
				<input type="hidden" name="id_history" value="<?php print $record2['id_history']?>">
				<input type="hidden" name="id_circuit" value="<?php print $record2['id_circuit']?>">
				<input type="hidden" name="id_bulan" value="<?php print $record2['id_bulan']?>">
				<input type="hidden" name="id_tahun" value="<?php print $record2['id_tahun']?>">
				<button type="submit" class="btn btn-primary">Rebuild</button>
			</form>
		</td>
	</tr>
        <?php } ?>
<?php } ?>
</tbody>
</table>

