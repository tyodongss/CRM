<?php
session_start();
session_destroy();
echo "<center>";
echo "<font color='white'>You have been successfully logged out! Please wait and you will be redirected to homepage!</font>";
echo "<br />";
echo "<font color='white'size='-2'>(<a href='login.php'>Or click here if you don't want to wait!</a>)</font>";
echo "<meta http-equiv=\"refresh\" content=\"3;login.php\">";
echo "</center>";
exit();
?>