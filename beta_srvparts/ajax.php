<?php
// require 'PHPMailer/PHPMailerAutoload.php';

$nom = $_POST["nom"];
$company = $_POST["company"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$msg = $_POST["msg"];

$message = "name: $nom<br />company: $company<br />phone: $phone<br />email: $email<br />message:<p>$msg</p>";
/*
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = '104.219.248.39';
$mail->SMTPAuth = true;
$mail->Username = 'contact@srvparts.com';
$mail->Password = 'superiorCh33se!';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465; 

$mail->From = 'contact@srvparts.com';
$mail->FromName = 'SRVCP Web Site';
$mail->addReplyTo($email, $nom);
$mail->addAddress('john@srvparts.com', 'John Walls');
$mail->addAddress('brandon@blackwelldata.com', 'Brandon');

$mail->WordWrap = 50;
$mail->isHTML(true);

$mail->Subject = 'SRVCP Web Contact Submission';
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
else echo "Comments submitted successfully. Thank you!";
*/


$headers = "From: SRVCP Web Site<contact@srvparts.com>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "CC: brandon@blackwelldata.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail("john@srvparts.com", "SRVCP Web Contact Submission", $message, $headers);
echo "Comments submitted successfully. Thank you!";
?>