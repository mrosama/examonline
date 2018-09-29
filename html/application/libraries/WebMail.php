<?php
include_once('class.phpmailer.php');

class WebMail {

 




public function Sendmail($address,$subject,$message,$from){
 
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8'. "\r\n";
$headers .= 'From: '.$from .' Reply-To: '.$from.'\r\n X-Mailer: PHP/'. phpversion();
if(@mail($address,$subject,$message,$headers)){
return true;
}else{
return false;
} 
 
}  







public function __Sendmail($to,$subject,$message,$attach=false,$From=false,$FromName=false,$setting=array()){

try {
$row=$setting;
 
$mail = new phpmailer();
$mail->Subject  =$subject;
if($From){
$mail->From     = $From;
} else {
$mail->From     = $row['frommail'];
}

if($FromName){
$mail->FromName = $FromName;
} else {
$mail->FromName = $row["fromname"];
}


$mail->CharSet='utf-8';
$mail->ContentType = "text/html";
$mail->IsHTML(true);
$mail->Priority ="1";
$mail->Port=$row['smtpport'];

if($attach){
$mail->AddAttachment($attach);
}
switch($row["mailserver"])
{
case "smtp" :
$mail->Host=$row["smtphost"];
$mail->SMTPDebug=false;
$mail->SMTPAuth=true;
$mail->Username=$row["smtpuser"];
$mail->Password=$row["smtppass"];
$mail->Mailer="smtp";
 break;
case "sendmail"  :
$mail->Sendmail=$row["path_sendmail"];
$mail->Mailer="sendmail";
break;
case "php":
default :
$mail->Mailer="mail";
break;
}
$mail->Body=$message;
$mail->AddAddress($to);

if(@!$mail->Send()) {
@$mail->ClearAddresses();
return false;
//echo "error";
} else {
return true;
//echo "ok";

}


} catch (phpmailerException $e) {
 echo $e->errorMessage(); 
} catch (Exception $e) {
  echo $e->getMessage(); 
}



}
































}

















?>