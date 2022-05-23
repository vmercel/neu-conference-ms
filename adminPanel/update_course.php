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
	$c_code = strip_tags(trim($_POST['c_code']));
	$c_title = strip_tags(trim($_POST['c_title']));
	$unit = strip_tags(trim($_POST['unit']));
	$c_id = strip_tags(trim($_POST['c_id']));
	if($admin->update_course($c_id,$c_code,$c_title,$unit)){
		echo "Record has been Updated!!!";
	}
	else{
		echo "No record was updated!!!";
	}
}
?>