<?php
include('../settings/dbconfig.php');
if($_SESSION['status']=='admin'){}
else{
	echo "<div class=\"wrapper\" align=\"center\"> <h3>You have no right to view this page </h3> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 0; URL=index.php');
	}
if(isset($_POST)){
	$std_id = $_POST['std_id'];
	if($admin->delete_student($std_id)){
	echo "User account has been deleted successfully!!!";
}
}
?>