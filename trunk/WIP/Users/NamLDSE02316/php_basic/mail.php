<?php
//mail(to,subject,message,headers,parameters);
$to="cuongnm01278@gmail.com";
$subject="check_mail";
$message="Learning php";
$from="cuongnm01278@fpt.edu.vn";
$headers="I'm ".$from;
mail($to,$subject,$message,$headers);
echo "Mail sent";
?>