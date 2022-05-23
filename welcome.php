
<?php
include('settings/dbconfig.php');
$page_title="Conference User Profile";
include('includes/header.php');
//include('includes/side_bar.php');
?>


<link rel="stylesheet" href="style.css">

<div class="container">
	 <div class="headline" align="center">
             <h1>Profile</h1>
         </div>
	<hr>
	<?php
		$image = $_SESSION['userPhoto'];//$student->get_profile_pix($_SESSION['userPhoto']);
	?>
	<div class="row">
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-2">
				<img class="img-thumbnail" src="<?php echo $image . "\""?> width="150px" height="150px"/>
			</div>
			<div class="col-md-4">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tbody>
							<tr>
								<th width="30%">Name </th>
								<td width="40%"><?php echo $_SESSION['userName'] ;?></td>
							</tr>
							<tr>
								<th>Email Address</th>
								<td><?php echo $_SESSION['emailAddress'];?></td>
							</tr>
							<tr>
								<th>Specialty</th>
								<td><?php echo $_SESSION['specialty'];?></td>
							</tr>
							<tr>
								<th>Qualification</th>
								<td><?php echo $_SESSION['qualification'];?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-3">
				
			</div>
		</div>	
	</div>

	<hr>
			<div align="center">
			<a class="register-link login-link" href="conferences.php">Subscribe to a Conference</a>
			</div>

</div>
<!-- // ===================================== -->
<?php 
include('config.php');

$sql1 = mysqli_query($conn, "SELECT conferences.conferenceID, conferences.conferenceTitle, conferences.conferenceStartDate, subscriptions.userID from conferences, subscriptions WHERE conferences.conferenceID=suBscriptions.conferenceID and subscriptions.userID='".$_SESSION["userID"]."' AND DATE(CURDATE()) BETWEEN STR_TO_DATE(conferences.conferenceStartDate,'%Y-%m-%dT%H:%i:%s.%f') AND STR_TO_DATE(conferences.conferenceEndDate,'%Y-%m-%dT%H:%i:%s.%f')"); 
if (mysqli_num_rows($sql1)>0){
$ar = mysqli_fetch_assoc($sql1);

$sql2 = mysqli_query($conn, "SELECT conferencesessions.sessionID, conferencesessions.sessionTitle, conferencesessions.sessionStartTime, attendanceregister.location, attendanceregister.status FROM conferencesessions INNER JOIN attendanceregister ON ( conferencesessions.conferenceID='".$ar["conferenceID"]."' AND attendanceregister.userID = '".$ar["userID"]."') ");
$ar2 = mysqli_fetch_assoc($sql2);
}else{
}
?>
<!-- // ===================================== -->





    	<div class="my-container">

	
		<div class="wrapper" >
		<h1> On-going Conferences </h1>
        		<h4 class="mb-3"> <?php echo date('Y-m-d h:i:s a')?></h4>



			<p> conference: <?php echo (isset($ar['conferenceID'])?$ar['conferenceID']:$ar['conferenceID']="CONF00")." ".(isset($ar['conferenceTitle'])?$ar['conferenceTitle']:$ar['conferenceTitle']="No Data. Please Register in a Conference first."); ?> </p>
        		<p> Sessions <p>

			<table class="table table-bordered table-striped">
			<thead>
				<th> Session ID </th>
				<th> Session Info </th>
				<th> Start Time </th>
				<th> Last Seen </th>
				<th> Presence % </th>
			</thead>
			<tbody>



            <?php 

		isset($ar['userID'])?$ar['userID']: $ar['userID']='A000Z';
		//$sql3 = mysqli_query($conn, "SELECT conferencesessions.sessionID, conferencesessions.sessionTitle, conferencesessions.sessionStartTime, attendanceregister.location, attendanceregister.status FROM conferencesessions INNER JOIN attendanceregister ON ( conferencesessions.conferenceID='".$ar["conferenceID"]."' AND attendanceregister.userID = '".$ar["userID"]."') ");
		$sql3 = mysqli_query($conn, " SELECT attendanceregister.sessionID, attendanceregister.sessionStartTime, attendanceregister.sessionTitle, attendanceregister.location, attendanceregister.status, attendanceregister.timeOut, conferencesessions.presenter FROM attendanceregister,conferencesessions WHERE attendanceregister.userID = '".$ar["userID"]."' AND attendanceregister.sessionID=conferencesessions.sessionID ");
		
		while($row = mysqli_fetch_array($sql3)):;?>
            <tr>
                <td><?php echo $row['sessionID'];?></td>
                <td><?php echo "<strong>Title :</strong>".$row['sessionTitle']."<br>"."<strong>Presenter:</strong> ".$row['presenter'];?></td>
                <td><?php echo $row['sessionStartTime'];?></td>
                <td><?php echo $row['location']." At ".$row['timeOut'];?></td>
		
		<td><?php echo $row['status'];?></td>
            </tr>
		
            <?php endwhile;?>
		
 
			</tbody>
			</table>
					
		</div>
        </div>
<script src="main.js"></script>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
           <!-- <p>Get GPS Location Every 5 seconds</p> -->

            <p id="coordinates"></p>
	    <p id="demo"></p>

            <body onload="getLocation()"> 

            <script>
            var x = document.getElementById("coordinates");
	    var y = document.getElementById("demo");

            function getLocation() {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
                setTimeout(getLocation, 10000);
              } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
              }
            }

            function showPosition(position) {

	   	var la = position.coords.latitude;
    		var lo = position.coords.longitude;
		var uid = '<%= Session["userID"] %>';
    		x.innerHTML="Latitude: " + la + "<br>Longitude: " + lo + "<br>Longitude: " + uid;
		


		$.post('callback.php',{'latitude':la, 'longitude':lo}, function(res){
			console.log(res);
			});

            }
            </script>









<?php
include('includes/footer.php');
?>
</html>