<?php
include('settings/dbconfig.php');
if($student->is_logged_in()){
	$student->redirect('welcome.php');
}
$page_title="Conference management system";
include('includes/header.php');
if(isset($_POST['btn_login'])){
	$username = trim($_POST['user_name']);
	$password = trim($_POST['pass']);
	if($student->login($username,$password)){
		$student->redirect('main.php');
	}
	else{
		$err_msg = "<div class='alert alert-danger'>Invalid Login details</div>";
	}
}
?>
<div align="center">
<h2>Conference Attendance MS</h2>
</div>
<hr/>
<div class="container">
	<h2 class="text-center"><u>Login Form</u></h2>
	<div class="col-md-6 col-md-offset-3">
		<p>Please login below to manange your attendance activities or click on sign up to create an account.</p>
		<form method="POST" class="form-horizontal" action="register.php">
			<div class="form-group-lg">
				<label>Username:</label>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input type="text" name="emailAddress" class="form-control" placeholder="Username" autocomplete="on"
					value="<?php if(isset($_POST['user_name'])){echo htmlspecialchars($_POST['user_name']);}?>" required/>
				</div>
			</div>
			<div class="form-group-lg">
				<label>Password:</label>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="password" class="form-control" placeholder="****************" required/>
				</div>
			</div><br/>
			<button type="submit" name="btn_login" class="btn btn-primary btn-lg">
			<span class="glyphicon glyphicon-log-in"></span> Login
			</button>
		</form>
		<?php if(isset($err_msg)){echo "<hr/>" . $err_msg;}?>
	</div>
</div>

<?php
include('includes/footer.php');
?>
