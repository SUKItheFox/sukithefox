<?php 
require_once('sendgrid-php/sendgrid-php.php');

$from = new SendGrid\Email(null, "mari.michelson@gmail.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "mari@to-bee.art");
$message = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $message);

$apiKey = (getenv('SENDGRID_API_KEY'));
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
if($response->statusCode() == 202){
    echo "Email sent successfully";
}else{
    echo "Email could not be sent";
}
?>