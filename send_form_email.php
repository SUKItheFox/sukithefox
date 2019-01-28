
<?php 
  $name = $_POST['name'];
  $email_from = $_POST['email'];
  $message = $_POST['message'];

  
  $email_subject = "Inquiry to SUKItheFox";
  $email_body = "User Name: $name.\n".
          "User Email: $visitor_email.\n".
            "User Message: $message.\n";


  $email_to = "mari@to-bee.art";
  
  $headers = "From: $email_from \r\n";

  $headers .= "Reply-To: $email_from \r\n";

  mail($email_to,$email_subject,$email_body,$headers);          

  

  if (mail($email_to,$email_subject,$email_body,$headers)) { 
    header("Refresh: 5; url=index.html");
    echo 'Thank you for the message!';
       
    } else {
      header("Refresh: 5; url=index.html");
    echo "Message Sending Failed, try again";
    }



?>
