<?php

if(isset($_POST['submit'])){

    require 'PHPMailer/PHPMailerAutoload.php';

    // Send mail
    $mail = new PHPMailer();

    // Data received from POST request
    $name = stripcslashes($_POST['tbName']);
    $email = stripcslashes($_POST['tbEmail']);
    $message = stripcslashes($_POST['taMessage']); 

    // SMTP Configuration
    $mail->SMTPAuth = true; 
    $mail->IsSMTP();
    $mail->Host = "mail.infomaniak.com"; // SMTP server
    $mail->Username = "mari@to-bee.art";
    $mail->Password = "Valgus9Armastus8";
    $mail->SMTPSecure = 'tls';   
    $mail->Port = 587; 

    $mail->AddAddress('mari@to-bee.art');
    $mail->From = "mari@to-bee.art";
    $mail->FromName = "Website Contact Form - " . $name;
   

    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';    
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->MsgHTML("Name:" . $name . "<br /><br />Email:" . $email. "<br /><br />Company:" . $message. "<br /><br />Subject:" . $message. "<br /><br />" . $message);

    $message = NULL;
    if(!$mail->Send()) {
        $message = "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $message = "Message sent!";
    }

}
?>