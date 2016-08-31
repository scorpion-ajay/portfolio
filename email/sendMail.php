<?php
ini_set('max_execution_time', 0);
require 'vendor/autoload.php';
   bhjdeemail("avcool6@gmail.com");
            //print_r($emails);
function bhjdeemail($kiskobhjnah){
  $sendgrid_username = "aries.ajay1";
  $sendgrid_password = "Fastrack@2015";
  $to                = $kiskobhjnah;
  $from              = "aries.ajay1@outlook.com";
  $transport  = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);
  $transport->setUsername($sendgrid_username);
  $transport->setPassword($sendgrid_password);

  $mailer     = Swift_Mailer::newInstance($transport);

  $message    = new Swift_Message();
  $message->setTo($to);
  $message->setFrom($from);
  $message->setSubject("message from online debate portal");
  $message->addPart($_POST["name"].$_POST["email"].$_POST["phone"].$_POST["message"], 'text/html');
  $header           = new Smtpapi\Header();


  $message_headers  = $message->getHeaders();
  $message_headers->addTextHeader("x-smtpapi", $header->jsonString());

  try {
    $response = $mailer->send($message);
    //print_r($response); echo "<br/>";
    header("location: ../index.php");
  } catch(\Swift_TransportException $e) {
   echo "err";
   print_r($e);
   print_r('Bad username / password');
 }

}
?>