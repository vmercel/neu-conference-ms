<?php
session_start();


require 'config.php';



if(isset($_POST['btn_signup'])){
$name = $_POST['fullName'];
$email = $_POST['emailAddress'];
$pass = $_POST['password'];
$qualif = $_POST['qualification'];
$phone = $_POST['phoneNumber'];// "05338764536";
$passport = $_POST['passport'];
$specialty = $_POST['specialty'];
$filename = isset($_FILES['uploadfile']['name'])?$_FILES['uploadfile']['name']:"profile.jpg";
$tempname = $_FILES['uploadfile']['tmp_name'];
$folder = "images/".$filename; 
$msg ="";
          
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{ $msg = "Failed to upload image"; }
  



$sql = "INSERT INTO users (userID, userName, email, password, phoneNumber, specialty, userQualification, userPhoto) VALUES (?,?,?,?,?,?,?,?)";
$stmt = $conn ->prepare($sql);
$stmt -> bind_param("ssssssss", $passport, $name, $email, $pass, $phone, $specialty, $qualif, $folder);
$stmt -> execute();
	if($stmt){
	echo "<div class=\"wrapper\" aligin=\"center\"> <h2>Registration Successful. You may login now.</h2> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" aligin=\"center\">redirecting... </div>";
	header('Refresh: 2; URL=index.php');
	}else{echo "Registration Failed";}
}


elseif(isset($_POST['btn_login'])){
$email = $_POST['emailAddress'];
$pass = $_POST['password'];
$sql = mysqli_query($conn,"SELECT userName, userID, specialty, userQualification, userPhoto, password  FROM users WHERE `email` = '$email' ");

$rows = mysqli_num_rows($sql);
if($rows>0){
$sq = mysqli_fetch_assoc($sql);
	if($sq['password']==$pass ){
	$_SESSION['emailAddress'] = $email;
	$_SESSION['userName'] = $sq['userName'];
	$_SESSION['userID'] = $sq['userID'];
	$_SESSION['qualification'] = $sq['userQualification'];
	$_SESSION['userPhoto'] = $sq['userPhoto'];
	$_SESSION['specialty'] = $sq['specialty'];
	echo "<div class=\"wrapper\" align=\"center\"> <h2>Login Successful</h2> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 2; URL=welcome.php');
	} else{
	echo "<div class=\"wrapper\" align=\"center\"> <h3>Email or Password Missmatch </h3> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 2; URL=index.php');
	}
	
    }

}elseif(isset($_POST['btn_recover'])){
echo "<div class=\"wrapper\" align=\"center\"> <h2> Process Failed sent</h2> </div>";
header('Refresh: 2; URL=index.php');
}

elseif(isset($_POST['btn_subscribe'])){
$conferenceID = $_POST['conferenceID'];
$userID = $_SESSION['userID'];
$checkn = mysqli_query($conn, "SELECT * FROM subscriptions WHERE userID='$userID' ");
$rows = mysqli_num_rows($checkn);
if($rows>0){
	echo "<div class=\"wrapper\" align=\"center\"> <h3> You have Already subscribed for this conference </h3> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 2; URL=welcome.php');
}
else{
$sql = mysqli_query($conn,"INSERT INTO subscriptions(userID, conferenceID) VALUES('$userID', '$conferenceID')");
if($sql){

	echo "<div class=\"wrapper\" align=\"center\"> <h2>Conference Subscription Successful</h2> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 2; URL=welcome.php');
	} else{
	echo "<div class=\"wrapper\" align=\"center\"> <h3> Subcription Failed </h3> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 2; URL=conferences.php');
	}
	
    }
}



 
//mysqli_close($conn);
?>
