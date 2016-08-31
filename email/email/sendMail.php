<?php
require 'vendor/autoload.php';
Dotenv::load(__DIR__);
 include('../../xunbao/login/credentials.php');

     $conn=new mysqli ($DB_SERVER , $DB_USERNAME  ,$DB_PASSWORD , $DB_DATABASE);
    if($conn->connect_error)
    {
      die("connection failed: ".$conn->connect_error);
    }
     $sql="SELECT `email` FROM `users`";
              $result= $conn->query($sql);
              if($result->num_rows > 0)
              {
               while($row= $result->fetch_assoc())
               {
                 //echo $row["email"]."<br/>";
                 bhjdeemail(mysql_real_escape_string($row["email"]));
              }
            }
            //print_r($emails);
function bhjdeemail($kiskobhjnah){
$sendgrid_username = "vipinkhushu";
$sendgrid_password = "anjali9796052592";
$to                = $kiskobhjnah;
$from              = "vipinkhushu@hotmail.com";
$transport  = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);
$transport->setUsername($sendgrid_username);
$transport->setPassword($sendgrid_password);

$mailer     = Swift_Mailer::newInstance($transport);

$message    = new Swift_Message();
$message->setTo($to);
$message->setFrom($from);
$message->setSubject("Xunbao - Online Treasure Hunt - Elements Culmyca 2016");
$message->addPart('<html>
<body>
<center>
<a href="http://www.elementsculmyca.com"><img src="data:image/png;base64,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">
<h3>Elements Culmyca</h3></a>
<br/>
<h3>Annual Cultural Cum Technical Fest Of YMCA UST</h3>
<h4>Presents</h4>
<h1>XUNBAO - Online Treasure Hunt<br/>Online treasure hunt</h1>
<h2>Lets hunt the pirate inside you</h2>
<a href="http://xunbao.elementsculmyca.com">
<button style="background:black;color:white;width:200px;height:50px;font-size: 30px;">Play Now</button>
</a>
<h3>Social Links</h3>
<h3><a href="http://facebook.com/culmyca">Facebook</a> | <a href="http://elementsculmyca.com">Website </a></h3>
<hr/>
To stop getting these emails or for further queries, Please write to vipinkhushu[at]hotmail[dot]com
</center>
</body>
</html>', 'text/html');
$header           = new Smtpapi\Header();


$message_headers  = $message->getHeaders();
$message_headers->addTextHeader("x-smtpapi", $header->jsonString());

try {
  $response = $mailer->send($message);
  echo "Sent";
  print_r($response);
} catch(\Swift_TransportException $e) {
	echo "err";
  print_r($e);
  print_r('Bad username / password');
}

}
?>