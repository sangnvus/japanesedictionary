<?php
if($_FILES["file"]["error"]>0){
	echo $_FILES["file"]["error"]."<br>";
}
else
{
	echo "Name file: ".$_FILES["file"]["name"]."<br>";
	echo "Type file: ".$_FILES["file"]["type"]."<br>";
	echo "Size file: ".($_FILES["file"]["size"]/1024)."<br>";
	echo "Store in path: ".$_FILES["file"]["tmp_name"]."<br>";
}
?>
