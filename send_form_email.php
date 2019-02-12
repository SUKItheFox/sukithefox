<?php
if(isset($_POST['submit'])) 
{

$message=
'Full Name: '.$_POST['name'].'<br />
Email:  '.$_POST['email'].'<br />
Message:    '.$_POST['message'].'<br />
';
    require "phpmailer/class.phpmailer.php"; //include phpmailer class
      
    // Instantiate Class  
    $mail = new PHPMailer();  
      
    // Set up SMTP  
    $mail->IsSMTP();                // Sets up a SMTP connection  
    $mail->SMTPAuth = true; 
    $mail->Host = "smtp.sendgrid.net"; // SMTP server
    $mail->SMTPSecure = 'tls';   
    $mail->Port = 587; 
    
    // Authentication  
    $mail->Username = "apikey";
    $mail->Password = "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";
      
    // Compose
    $mail->SetFrom($_POST['email'], $_POST['name']);
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = "New Contact Form Enquiry";      // Subject (which isn't required)  
    $mail->MsgHTML($messages);
 
    // Send To  
    $mail->AddAddress("mari.michelson@gmail.com", "Recipient Name"); // Where to send it - Recipient
    $result = $mail->Send();        // Send!  
    $messages = $result ? 'Successfully Sent!' : 'Sending Failed!';      
    unset($mail);

}
?>
