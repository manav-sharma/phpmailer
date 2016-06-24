<?php 
$dir = "Absolute File Path"; 		# FOR ATTACHMENT 
$file =	"image.jpg";				# FILE NAME				
if(isset($_POST['user'])){
	require_once('inc/class.phpmailer.php');		# INCLUDE PHPMailer CLASS FILE
	include("inc/class.smtp.php");					# INCLUDE OTHER SMTP FILE
	
	$mail             = new PHPMailer();
	
	$mail->IsSMTP(); 
	$mail->Host       = "Host Address"; 		# HOST ADDRESS
	$mail->SMTPDebug  = 0;                      # ENABLE SMTP DEBUG INFORMATION (FOR TESTING)
											    # 1 = ERROR AND MESSAGE
											    # 2 = MESSAGE ONLY
	$mail->SMTPAuth   = true;                   # ENABLE SMTP AUTHENTICATION
	$mail->Host       = "Host Addresss";
	$mail->Port       = 25;                     # PORT NUMBER
	$mail->Username   = "abc@example.cok"; 		# SMTP EMAIL USER NAME
	$mail->Password   = "password";        	# SMTP ACCOUNT PASSWORD
	$mail->SetFrom('abc@example.com', 'Test Message');
	
	$mail->AddReplyTo("abc@example.com","SMTP TEST");
	$v_Msg ="This is a test message via SMTP";
	$mail->AddAttachment($dir.''.$filename); # EMAIL ATTACHMENT
	$mail->Subject    = "EMAIL SUBJECT";
	
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; # OPTIONAL
	$address = "sendto@email.com";			# ADDRESS WHERE YOU WANT TO SEND MAIL
	$mail->AddAddress($address, "TESTING");
	$mail->MsgHTML($v_Msg);					# EMAIL CONTENT
	
	if(!$mail->Send()) {					
		echo "Mailer Error: " . $mail->ErrorInfo;	# ERROR MESSAGE, IF MAIL NOT SENT SUCCESSFULLY 
	}else {
		echo "Message sent!";				# SUCCESS MESSAGE
	}
}
?>