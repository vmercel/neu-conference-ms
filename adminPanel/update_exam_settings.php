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
	$time = strip_tags(trim($_POST['time']));
	$no_of_quest_to_ans = strip_tags(trim($_POST['no_of_quest_to_ans']));
	$status = strip_tags(trim($_POST['status']));
	if($admin->update_exam_settings($c_code,$time,$no_of_quest_to_ans,$status)){
		echo "Record has been Updated!!!";
	}
	else{
		echo "No record was updated!!!";
	}
}
?>