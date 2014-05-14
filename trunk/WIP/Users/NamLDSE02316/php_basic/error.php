<?php
function customError($errno,$errstr){
echo "<b>Error:</b>" .$errno .$errstr."<br>";
echo "Ending Script";
die();
}
//set error handler
//set_error_handler("customError");

//triger error
//if(!isset($test))trigger_error("Variable doesn't exist!<br>");//trigger_error
$test=2;
if($test>1)
{
trigger_error("Must be lower than 1");
}
echo $test; 	 	


if(!file_exists("welcome.txt")){
die("File not found");
}
else
$file=fopen("welcome.txt","r");
?>