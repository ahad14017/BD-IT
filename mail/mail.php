<?php

//require_once "vendor/autoload.php";
$email = $_GET['email'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer();


if(!$sock = @fsockopen('www.google.com', 80))
{
    echo 'Not Connected';
    echo    "<script type='text/javascript'>location.href = 'http://localhost/webProjects/mail/blank2.html';</script>";
}
else
{
echo 'Connected';
}

  $mail->IsSMTP(); // enable SMTP

try {
    $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; //465 or 587
    $mail->IsHTML(true);
    $mail->Mailer = "smtp";
    $mail->Username = "estiak.siddiki@gmail.com";
    $mail->Password = "199418181818";
    $mail->SetFrom("estiak.siddiki@gmail.com");

    $mail->addAttachment("sample.pdf", "File.pdf");        
	//$mail->addAttachment("images/profile.png"); //Filename is optional

    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("virginfom@gmail.com");
    $mail->AddAddress($email);

} catch (phpmailerException $e) {
      //echo $e->errorMessage(); //Pretty error messages from PHPMailer
  echo    "<script type='text/javascript'>location.href = 'http://localhost/webProjects/mail/blank2.html';</script>";
} catch (Exception $e) {
      //echo $e->getMessage(); //Boring error messages from anything else!
  echo    "<script type='text/javascript'>location.href = 'http://localhost/webProjects/mail/blank2.html';</script>";
}



     if(!$mail->Send()) {
       // echo "Mailer Error: " . $mail->ErrorInfo;
        echo "errrrror";
       echo    "<script type='text/javascript'>location.href = 'http://localhost/webProjects/mail/blank2.html';</script>";
     } else {

        echo "Message has been sent";
        echo    "<script type='text/javascript'>location.href = 'http://localhost/webProjects/mail/blank.html';</script>";
     }


//PHPMailer Object
//$mail = new PHPMailer;











// //From email address and name
// $mail->From = "estiak.siddiki@gmail.com";
// $mail->FromName = "Full Name";

// //To address and name
// $mail->addAddress("estiak.siddiki@gmail.com", "Recepient Name");
// $mail->addAddress("estiak.siddiki@gmail.com"); //Recipient name is optional

// //Address to which recipient will reply
// $mail->addReplyTo("estiak.siddiki@gmail.com", "Reply");

// //CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

// //Send HTML or Plain Text email
// $mail->isHTML(true);

// $mail->Subject = "Subject Text";
// $mail->Body = "<i>Mail body in HTML</i>";
// $mail->AltBody = "This is the plain text version of the email content";

// if(!$mail->send()) 
// {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } 
// else 
// {
//     echo "Message has been sent successfully";
// }

  


     ?>



