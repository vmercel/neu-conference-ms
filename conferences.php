<!DOCTYPE html>
<html>
<?php
include('settings/dbconfig.php');

$page_title="Available Converences";
include('includes/header.php');
?>



<link rel="stylesheet" href="style.css">

<div class="container">
	 <div class="headline" align="center">
             <h1>Active Conferences</h1>
         </div>
	<hr>

	<div class="row">
		<div class="row" >
			<div class="col-md-3">
				
			</div>
			<div class="col-md-2">
				<img class="img-thumbnail" src="<?php echo $_SESSION['userPhoto'] . "\""?> width="150px" height="150px"/>
			</div>
			<div class="col-md-4">
			<p><h3> AIE 223: Recent Advances in blockchain technology </h3></p>
			<p><h5> Dates: April 27 to May 6, 2022 </h3></p>
			</div>
			
			<div id="register-box">
			<form method="POST" action="register.php">
				<input type="hidden" name="conferenceID" value="AIE223" >
				<button type="submit" name = "btn_subscribe" class="btn btn-success btn-lg">
				<span class="glyphicon glyphicon-log-in"> </span> Subscribe to Conference
				</button>
			</form>
			</div>
			



		</div>	
	</div>

	<hr>

<script src="js/login.js"></script>
<?php
include('includes/footer.php');
?>
</html>