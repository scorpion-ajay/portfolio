<?php
 include('../../xunbao/login/credentials.php');
$emails=array();
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
                 echo $row["email"]."<br/>";
                 array_push($emails,$row["email"]);
              }
            }
            print_r($emails);
?>