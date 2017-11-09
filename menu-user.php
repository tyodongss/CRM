<?php
$id = $_SESSION['id'];

if ($id!=""){

if ($_SESSION['devel']=="on"){
?>
<i>Developer ON (<?php print $_SESSION['role'] ?>)</i> | 
<a href="proses-dev.php?menu=logout"><b>Exit Developer Session</b></a>
<?php } ?>

<ul class="user-menu">
	<li class="dropdown pull-right">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<span class="glyphicon glyphicon-user"></span>
			<?php print $_SESSION['name_engineer'] ?>
		<span class="caret"></span>
		</a>
	 	<ul class="dropdown-menu" role="menu">
			<li><a href="ubah-engineer.php?id=<?php print $_SESSION['id']?>"><span class="glyphicon glyphicon-user"></span>Edit Profile</a></li>
			<li><a href="proses-login.php?session=close"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	 	</ul>
	</li>
</ul>
<?php 
} else {
?>
<meta http-equiv="refresh" content="0;index.php?err=backdoor">
<?php } ?>
