<?php 
require_once('sendgrid-php/sendgrid-php.php');

$from = new SendGrid\Email(null, $_POST['email']);
$name = new SendGrid\fname(null, $_POST['name']); //senders fname
$subject = "Email from SUKItheFox Website";
$to = new SendGrid\Email(null, "mari.michelson@gmail.com");
$message = new SendGrid\Content(null, $_POST['message']);
$mail = new SendGrid\Mail($from, $name, $subject, $to, $message);

$apiKey = (getenv('SENDGRID_API_KEY'));
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
if($response->statusCode() == 202){
    echo "Email sent successfully";
}else{
    echo "Email could not be sent";
}
?>