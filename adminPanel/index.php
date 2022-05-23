<?php
include('../settings/dbconfig.php');
$page_title="Administrator Panel Login";
include('header.php');
?>
<hr/>
<div class="container">
	<h2 class="text-center"><u>Administrator Login</u></h2>
	<div class="col-md-6 col-md-offset-3">
		<form method="POST" class="form-horizontal" action="register.php">
			<div class="form-group-lg">
				<label>User ID:</label>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input type="text" name="emailAddress" class="form-control" placeholder="Username" autocomplete="on" required/>
				</div>
			</div>
			<div class="form-group-lg">
				<label>Password:</label>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="password" class="form-control" placeholder="****************" required/>
				</div>
			</div><br/>
			<button type="submit" name="btn_admin_login" class="btn btn-primary btn-lg">
			<span class="glyphicon glyphicon-log-in"></span> Login
			</button>
		</form>
		<?php if(isset($err_msg)){echo "<hr/>" . $err_msg;}?>
	</div>
</div>

<?php
include('footer.php');
?>