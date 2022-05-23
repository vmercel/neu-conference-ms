<?php

// Get date and time variables
    date_default_timezone_set('EET');  // for other timezones, refer:- https://www.php.net/manual/en/timezones.asia.php
    $d = date("Y-m-d");
    $t = date("H:i:s");
// set the duration of the class in hours minutes and seconds. Just adjust the numbers in the line below
    $duration = '+ 0 hours + 2 minutes + 0 seconds';
    
// set a temporary Time_out to be inserted in the Time_out column
    $temp = '00:00:00';



    //Create connection
     $conn = mysqli_connect('fdb29.awardspace.net', '3664631_websm', '75by}D%^6MqNHR%S', '3664631_websm');
    
     if(isset($_POST['lat']) && isset($_POST['lng'])){
      
		//Getting values
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$device = $_POST['did'];
		$spd = $_POST['spd'];
		$dir = $_POST['dir'];
		$arc = $_POST['arc'];
		$phone ="0533823913" ;// $_POST['phn'];
		$date = date("Y/m/d");
		$gpsT = date("Y-m-d H:i:s");
		$locmethod = "blablabla";
		$extraInfo = "blablabla";
		$eventType = "blablabla";

// set the duration of the class in hours minutes and seconds. Just adjust the numbers in the line below
    		$duration = '+ 0 hours + 2 minutes + 0 seconds';
    
// set a temporary Time_out to be inserted in the Time_out column
   		$temp = '00:00:00';
		

		//Creating an sql query
   







    

// ================== MAIN EXECUTABLE STARTS HERE =============================


// Check if student has logged in for the first time
        $check1 = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM attend_with_MAC where `Date` ='".$d."' AND `std_mac_adr` ='".$std_mac_adr."' "));


    if($check1 == 0){
	$sql = "INSERT INTO gpslocations (latitude,longitude, phoneNumber, speed, direction, accuracy, userName, sessionID, gpsTime, locationMethod, extraInf, date, eventType ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt= $conn->prepare($sql);
	$stmt->bind_param("sssssssssssss", $lat, $lng, $phone, $spd, $dir, $arc, $device, $device, $gpsT, $locmethod, $extraInfo, $d, $temp);
	$stmt->execute();
                          echo "Insertion Done Successfully";
        
        }else{
        $check2 = mysqli_query($conn, "SELECT * FROM gpslocations where `Date` ='".$d."' AND `userName` =$device ");
        $row = $check2 -> fetch_array(MYSQLI_ASSOC);
   
        $endTime = date('H:i:s',strtotime($duration, strtotime($row['Time'])));

    
    if($t >= $endTime && $row['Time_out'] == $temp){
            $sql2 = "UPDATE gpslocations SET Time_out = '".$t."' WHERE userName = '$std_mac_adr' AND `date` ='".$d."' ";
           mysqli_query($conn, $sql2);
                            echo "Time_out updated Successfully";
            
            }
    
         }
    }
// ================== END OF MAIN CODE ===========================================








?>