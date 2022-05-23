<?php
session_start();
include('../config.php');
if($_SESSION['status']!='admin')
{
	echo "<div class=\"wrapper\" align=\"center\"> <h3>You have no right to view this page </h3> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 0; URL=index.php');
	}
$page_title = "Online Computer Based Examination Administrator Dashboard";
include('header.php');
include('side_bar.php');?>
		<div class="container-fluid">
			<div class="col-sm-12 main">
				<h1>Administrator Dashboard</h1><hr/>
				<p>Please Navigate with the Sidebar</p>
			</div>
		</div>

<?php
//echo password_hash('ocbt_administrator',PASSWORD_DEFAULT);
include('footer.php');
?>
