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
	$std_id = strip_tags(trim($_POST['std_id']));
	$fname = strip_tags(trim($_POST['fname']));
	$lname = strip_tags(trim($_POST['lname']));
	$uname = strip_tags(trim($_POST['uname']));
	$dept = strip_tags(trim($_POST['dept']));
	$level = strip_tags(trim($_POST['level']));
	if($admin->update_student_details($fname,$lname,$uname,$dept,$level,$std_id)){
		echo "Student Record has been Updated!!!";
	}
	else{
		echo "No record was updated!!!";
	}
}
?>