<?php 
  $name = $_POST['name'];
  $sender_email = $_POST['email'];
  $message = $_POST['message'];

  $email_from = "$sender_email"; 
  $email_subject = "Inquiry to SUKItheFox";
  $email_body = "User Name: $name.\n".
          "User Email: $sender_email.\n".
            "User Message: $message.\n";


  $to = "mari@to-bee.art";
  
  $headers = "From: $email_from \r\n";

  $headers .= "Reply-To: $sender_email \r\n";

  mail($to,$email_subject,$email_body,$headers);          

  

  if (mail($to,$email_subject,$email_body,$headers)) { 
    header("Refresh: 5; url=index.html");
    echo 'Thank you for the message!';
       
  } else {
    header("Refresh: 5; url=index.html");
    echo "Message Sending Failed, try again";
  }



?>
