<?php
include('../settings/dbconfig.php');
if($admin->is_admin_logged_in()){
	$admin->admin_logout();
	$student->redirect('index.php?logout=true');
}
else{
	$student->redirect('index.php');
}
?>