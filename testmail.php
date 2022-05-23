<?php

	//Include required PHPMailer files
	require 'admin/mailer/PHPMailer.php';
	require 'admin/mailer/SMTP.php';
	require 'admin/mailer/Exception.php';

	//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


	if(!empty($_GET['message']) && !empty($_GET['receiver'])){
	//$email = $_GET['email'];
	$message = $_GET['message'];
	$receiver = $_GET['receiver'];
	echo $message."<br>";
	echo $receiver;


		$messageBody = "Dear Mercel";

          	$mail = new PHPMailer();
		if($mail){echo "<br>"."Mail is Set"."<br>";}{}							                                        //Create instance of PHPMailer

          	$mail->isSMTP();									                                        //Set mailer to use smtp
          	$mail->Host = "smtp.gmail.com";						                                        //Define smtp host
          	$mail->SMTPAuth = true;								                                        //Enable smtp authentication
          	$mail->SMTPSecure = "tls";							                                        //Set smtp encryption type (ssl/tls)
          	$mail->Port = "587";								                                        //Port to connect smtp
          	$mail->Username = "vmercel@gmail.com";		                                        //Set gmail username
          	$mail->Password = "mppfrpgnrkpsnpcz";						                                        //Set gmail password
          	$mail->Subject = "NEU Conference Notification";	                                                        //Email subject
          	$mail->setFrom("vmercel@gmail.com", "NEU Conference Team");				            //Set sender email
          	$mail->isHTML(true);									                                    //Enable HTML
          	//$mail->addAttachment('img/attachment.png');			                                    //Attachment
          	//Email body
          	$mail->Body = $messageBody;
          	$mail->addAddress($receiver);				                                                //Add recipient

          	//Finally send email
          	if ( $mail->send() ) {
          		echo "Email Sent..!";
			header("Location: welcome.php");


          	} else {
          	    echo "Send Failed ... !";
			header("Location: welcome.php");
          	}

          	$mail->smtpClose();										//Closing smtp connection
    }else{
	echo "Could not receive forwarding details";
	header("Location: welcome.php");
	}
?>
