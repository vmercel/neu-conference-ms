<?php
session_start();
date_default_timezone_set('Asia/Nicosia');
//Create connection
//$conn = mysqli_connect('fdb29.awardspace.net', '3664631_websm', '75by}D%^6MqNHR%S', '3664631_websm');
      $conn = mysqli_connect('localhost', 'root', '', 'conferencems');

      if(isset($_POST['latitude']) && isset($_POST['longitude'])){
      $lat = (float)$_POST['latitude'];
      $long = (float)$_POST['longitude'];
      $userID = $_SESSION['userID'];

import

// retrieve session data
$sql3 = mysqli_query($conn, "SELECT subscriptions.userID, subscriptions.conferenceID, conferences.conferenceTitle, conferencesessions.sessionID, conferencesessions.sessionTitle, conferencesessions.sessionStartTime, conferencesessions.sessionEndTime, conferencesessions.room, conferencesessions.sessionTitle FROM subscriptions, conferencesessions, conferences WHERE conferencesessions.conferenceID=conferences.conferenceID AND subscriptions.userID = '$userID' AND subscriptions.conferenceID = conferences.conferenceID AND NOW() BETWEEN STR_TO_DATE(conferencesessions.sessionStartTime,'%H:%i:%s.%f') AND STR_TO_DATE(conferencesessions.sessionEndTime,'%H:%i:%s.%f')");
$array= mysqli_fetch_array($sql3);
	$userID = isset($array[0])?$array[0]:0;
	$conferenceID = isset($array[1])?$array[1]:0;
	$sessionID = isset($array[3])?$array[3]:0;
	$sessionStartTime = isset($array[5])?$array[5]:0;
	$sessionEndTime = isset($array[6])?$array[6]:0;
	$roomID = isset($array[7])?$array[7]:0;
	$sessionTitle = isset($array[8])?$array[8]:0;
	$timeIn = date('H:i:s');
	//$timeOut = "09:55:00";

echo "session end time is: ".$sessionEndTime."<br>";
echo "session id is : ".$sessionID."<br>";

// retrieve room data
	$sqly = mysqli_query($conn, "SELECT latitude, longitude FROM rooms WHERE roomID = '$roomID'");
	$coord = mysqli_fetch_array($sqly);
	$Tlat = (float)$coord['latitude'];
	$Tlong = (float)$coord['longitude'];
	//$distance = (((acos(sin((".$lat."*pi()/180)) * sin((".$Tlat."*pi()/180)) + cos((".$lat."*pi()/180)) * cos((".$Tlat."*pi()/180)) * cos(((".$long."- ".$Tlong.") * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344);


// Define a function to calculate distance between two coordinates
function geoDist($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return round($miles * 1.609344,4);
  } else if ($unit == "N") {
      return round($miles * 0.8684,4);
  } else {
      return round($miles,4);
  }
}
	$distance= geoDist($lat,$long,$Tlat, $Tlong,"K");


echo "Distance away is: ".$distance."<br>";

// Define users location based on distance from venue
	if($distance <0.04){$location="In Room";}else{$location="Out of Room";}

echo "Location is:   ".$location."<br>";



// check if monitoring has started
$checkm = mysqli_query($conn, "SELECT * FROM attendanceregister WHERE userID='$userID' AND sessionID='$sessionID' ");
echo "";
echo mysqli_num_rows($checkm);

if(mysqli_num_rows($checkm)==0 && $location=="In Room"){
//$sql = "INSERT INTO `attendanceregister` (`userID`, `conferenceID`, `sessionID`, `sessionTitle`, `sessionStartTime`,`sessionEndTime`, `roomID`, `date`, `timeIn`, `timeOut`, `location`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
$date = date('Y-m-d');
$status = "0";
$SQL = "INSERT INTO `attendanceregister` (`id`, `userID`, `conferenceID`, `sessionID`, `sessionTitle`, `sessionStartTime`, `sessionEndTime`, `roomID`, `date`, `timeIn`, `timeOut`, `location`, `status`) VALUES (NULL, '$userID', '$conferenceID', '$sessionID', '$sessionTitle', '$sessionStartTime', '$sessionEndTime', '$roomID', '$date', '$timeIn', '$timeOut', '$location', '$status')";
$STM = mysqli_query($conn,$SQL);



//$stmt= $conn->prepare($sql);
//$stmt->bind_param("sssssssssss", $userID, $conferenceID, $sessionID, $sessionStartTime, $sessionEndTime, $roomID, $date, $timeIn, $timeOut, $location, $status);
//$stmt->execute();
if($STM){ echo json_encode("<br>"."Insert Succesful"."<br>");} else {echo json_encode("<br>"."Problem! Insert Failed."."<br>".mysqli_error($conn));}
}elseif(mysqli_num_rows($checkm) > 0 && $location=="In Room"){


$data = mysqli_fetch_assoc($checkm);
$timeOut = $data['timeOut'];
$oldstatus = $data['status'];

echo "";
echo $oldstatus;

// Calculate percentage progress in attendance
$time1 = new DateTime($sessionEndTime);
$time2 = new DateTime($sessionStartTime);
$int1 = $time1->diff($time2);
$denom = $int1->s + $int1->i*60 + $int1->h*3600;
$time3 = new DateTime(date('h:i:s'));
$time4 = new DateTime($timeOut);
$int2 = $time3->diff($time4);
$num = $int2->s + $int2->i*60 + $int2->h*3600;
$newStatus = round($oldstatus + ($num/$denom)*100 , 2);
$newTimeOut = date('h:i:s');
echo "<br>";
echo $newStatus;

$sql = mysqli_query($conn, " UPDATE attendanceregister SET timeOut = '$newTimeOut', location='$location', status ='$newStatus' WHERE userID ='$userID' AND sessionID='$sessionID' ");
if($sql){ echo json_encode("Update Succesful");} else {echo json_encode("Problem! Update Failed.");}
}elseif(mysqli_num_rows($checkm) > 0 && $location=="Out of Room"){
$location = "Out of Room";
$newTimeOut = date('h:i:s');
$sql = mysqli_query($conn, " UPDATE attendanceregister SET timeOut = '$newTimeOut', location ='$location' WHERE userID ='$userID' AND sessionID='$sessionID' ");
if($sql){ echo json_encode("Update Succesful");} else {echo json_encode("Problem! Update Failed.");}
}


}
?>
