<?php
include('settings/dbconfig.php');
$page_title="Student Registeration Form";
include('includes/header.php');

if(isset($_POST['create_acct'])){
	$first_name = trim($_POST['fname']);
	$last_name = trim($_POST['lname']);
	$username = trim($_POST['user_name']);
	$password = trim($_POST['pass']);
	$dept = trim($_POST['dept']);
	$level = trim($_POST['level']);
	//Add the user to the database, and show success message 
	if($student->std_register($first_name,$last_name,$username,$password,$dept,$level)){
		$msg = "<p class='alert alert-success'>Account Created Successfully,Please Log into your account</p>";
	}
	// If user  is not added, show the error message.
	else{
		$msg = "<p class='alert alert-danger'>Error Creating your account, please try again</p>";
	}
}
?>
	<div class="container">
	<?php if(isset($msg)){ echo $msg;}?>
	<h1 class="text-center"><u>Registration Form</u></h1><hr/>
		<div class="col-md-6 col-md-offset-3">
			<form method="POST" class="form-horizontal" id="std_reg_form" enctype="multipart/form-data" action="register.php">
				<div class="form-group form-group-lg">
					<label>FullName:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" name="fullName" class="form-control" placeholder="Full Name"/>
				</div>
				</div>
				<div class="form-group form-group-lg">
					<label>Passport No:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" name="passport" class="form-control" placeholder="Passport Number"/>
				</div>
				</div>
				<div class="form-group form-group-lg">
					<label>Email Address:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" name="emailAddress" class="form-control" placeholder="Email Address"/>
					</div>
				</div>
				<div class="form-group form-group-lg">
					<label>Phone Number:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number"/>
					</div>
				</div>
				<div class="form-group form-group-lg">
					<label>Password:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" name="password" class="form-control" placeholder="****************"/>
				</div>
				</div>

				<div class="form-group form-group-lg">
					<label>Specialty:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" name="specialty" class="form-control" placeholder="e.g Agricultural Engineering"/>
					</div>
				</div>
				<div class="form-group form-group-lg">
					<label>Current Qualification:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" name="qualification" class="form-control" placeholder="e.g Ph.D."/>
					</div>
				</div><br/>
				<div class="form-group form-group-lg">
					<label>Picture:</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="file" name="uploadfile" class="form-control" placeholder="e.g Ph.D."/>
					</div>
				</div><br/>
				<button type="submit" name = "btn_signup" class="btn btn-success btn-lg">
				<span class="glyphicon glyphicon-log-in"> </span> Create My account
				</button>
			</form>
		</div>
	</div>
<?php
include('includes/footer.php');
?>