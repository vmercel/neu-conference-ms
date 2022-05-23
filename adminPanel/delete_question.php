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
	$q_id = $_POST['q_id'];
	if($admin->delete_question($q_id)){
	echo "Question has been deleted successfully!!!";
}
}
?>