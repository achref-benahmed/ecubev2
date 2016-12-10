
<?php

require 'class.phpmailer.php';
require 'PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
//$mail->Port = 465;
//$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
//
 $mail->Port = 587;
 $mail->SMTPSecure = 'tls';
 
 
$mail->Username = "amina.mahdhaoui@esprit.tn";
$mail->Password = "9145813amina";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->CharSet = "utf-8";
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
 
$mail->From = "amina.mahdhaoui@esprit.tn";

 if (isset($_POST["name"]))
{
	$mail->FromName = $_POST["name"];
}
$mail->addAddress($_POST["email"],"User 1");
$mail->Body ="";
if (isset($_POST["message"]))
{
	$mail->Body .="<p>".$_POST["message"]."</p>";;
}

if (isset($_POST["occation"]))
{
	$mail->Body .="<p><b>Information: </b>".$_POST["occation"]."</p>";
}

if (isset($_POST["date"]))
{
	$mail->Body .="<p><b>Date&Time: </b>".$_POST["date"]."</p>";
}

if (isset($_POST["name"]))
{
	$mail->Body .="<p>Cordialement. </p>";
}
 
$mail->Subject = "Testing PHPMailer with localhost";


if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
    echo "Message has been sent";

?>
