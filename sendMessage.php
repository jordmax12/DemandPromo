<?php
require_once "class.phpmailer.php";
$name = $_POST['name'];
$email= $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$mail = new PHPMailer;

$mail->From = $email;
$mail->FromName = $name;

$mail->addAddress("sales@demandpromo.com", "End User");
$mail->addAddress("jpgross2@gmail.com", "End User 2");
//$mail->addAddress("jordmax12@gmail.com", "End User 2");

$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = "<h1 class='gotham-light' style='color=red'>Message from: " . $name . " / " . $email . " <br/><br/> Enclosed: " . $message . "</h1></br>";

$mail->AltBody = "Message from: " . $name . " / " . $email . " Enclosed: " . $message;

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
	header("Location: http://www.jdmdev.net/DemandPromo?success=false&message=Sending mail failed: " + $mail->ErrorInfo);
	die();
} 
else 
{
	//echo $name;
	header("Location: http://www.jdmdev.net/DemandPromo/contact.html?success=true&message=We'll be in contact soon, thanks!");
	die();
}

// public function AddAttachment($path,
//                               $name = '',
//                               $encoding = 'base64',
//                               $type = 'application/octet-stream')


?>

<!--  -->