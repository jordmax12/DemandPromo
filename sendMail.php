<?php
require_once "class.phpmailer.php";
$name = $_POST['name'];
$email= $_POST['email'];
$quantity = $_POST['quantity'];
$product = $_POST['product'];
$mail = new PHPMailer;

$mail->From = $email;
$mail->FromName = $name;

$mail->addAddress("sales@demandpromo.com", "End User");
$mail->addAddress("jpgross2@gmail.com", "End User 2");
//$mail->addAddress("jordmax12@gmail.com", "End User 2");

$mail->isHTML(true);

$mail->Subject = "QUOTE REQUEST";
$mail->Body = "<h1 class='gotham-light' style='color=red'> Quote Request from " . $name . " : " . $email . " </h1><h2>Request was for " . $quantity . " of " . $product . "</h2></br>";

$mail->AltBody = " Quote Request from ". $name. " : ". $email ."Request was for " .$quantity ." of " . $product;

// $mail->Body = "<span> Quote Request from JordanMax : test@gmail.com</span><br/>
// 				<span> Request was for 2 of product</span>";
// $mail->AltBody = " Quote Request from JordanMax : test@gmail.com Request was for 2 of product";

if (isset($_FILES['get-quote-file-upload']) &&
    $_FILES['get-quote-file-upload']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['get-quote-file-upload']['tmp_name'],
                         $_FILES['get-quote-file-upload']['name']);

	$mail->Body .= " <h3 style='color=green'>Attachment included</h3>";
}

if (isset($_FILES['get-quote-file-upload-modal']) &&
    $_FILES['get-quote-file-upload-modal']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['get-quote-file-upload-modal']['tmp_name'],
                         $_FILES['get-quote-file-upload-modal']['name']);

	$mail->Body .= " <h3 style='color=green'>Attachment included</h3>";
}

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
	header("Location: http://www.jdmdev.net/DemandPromo?success=false&message=Sending mail failed: " + $mail->ErrorInfo);
	die();
} 
else 
{
	//echo $name;
	header("Location: http://www.jdmdev.net/DemandPromo?success=true&message=We'll be in contact soon, thanks!");
	die();
}

// public function AddAttachment($path,
//                               $name = '',
//                               $encoding = 'base64',
//                               $type = 'application/octet-stream')


?>

<!--  -->