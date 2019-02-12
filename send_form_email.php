<?
function send_mail($email,$subject,$msg) {
$api_key=(getenv('MAILGUN_API_KEY'));/* Api Key got from https://mailgun.com/cp/my_account */
$domain ="sandbox596decd0697d48c7aa08d007d503258f.mailgun.org";/* Domain Name you given to Mailgun */
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.$domain.'/messages');
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
'from' => 'mari.michelson@gmail.com',
'to' => $email,
'subject' => $subject,
'html' => $msg
));
$result = curl_exec($ch);
curl_close($ch);
return $result;
}
   if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $msg=$_post['message'];
    if($name!="" && $msg!=""){
     $ip_address=$_SERVER['REMOTE_ADDR'];
     send_mail("email@emaildomain.com","New Message","The IP ($ip_address) has sent you a message : <blockquote>$msg</blockquote>");
     echo "<h2 style='color:green;'>Your Message Has Been Sent</h2>";
    }else{
     echo "<h2 style='color:red;'>Please Fill Up all the Fields</h2>";
    }
   }
   ?>