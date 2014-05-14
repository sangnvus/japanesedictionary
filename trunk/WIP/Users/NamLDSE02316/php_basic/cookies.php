<?php

$expire=time()+60*60*24*30;
setcookie("user","Cuong");//set cookie
echo $_COOKIE["user"]."<br>";
print_r ($_COOKIE);
echo "<br>";
if(isset($_COOKIE["user"]))//check cookie boolean
setcookie("user","");
echo "Welcome " .$_COOKIE["user"]."!<br>";
echo "Welcome guest!"


?>