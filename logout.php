<?php
session_start();
session_destroy();
session_unset();

	echo "<div class=\"wrapper\" align=\"center\"> <h3> Loged Out </h3> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 2; URL=index.php');
?>