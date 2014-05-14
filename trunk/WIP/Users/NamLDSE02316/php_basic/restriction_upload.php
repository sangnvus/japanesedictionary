<?php
$allowExts=array("gif","jpeg","jpg","png");
$temp=explode(".",$_FILES["file"]["name"]);//explode tach cac chuoi boi ky tu va tao ra array cua chuoi
$extension= end($temp);//end lay phan tu cuoi cua array
if((($_FILES["file"]["type"]== "image/jpg")
||($_FILES["file"]["type"]== "image/jpeg")
||($_FILES["file"]["type"]== "image/png")
||($_FILES["file"]["type"]== "image/gif")
)
&&($_FILES["file"]["size"]<200000)
&& in_array($extension,$allowExts)//in_array : match neu co phan tu thuoc array can sosanh
){
	if($_FILES["file"]["error"]>0){
		echo "Error: ".$_FILES["file"]["error"]."<br>";
	}
	
	else{
		echo "Name file: ".$_FILES["file"]["name"]."<br>";
		echo "Type file: ".$_FILES["file"]["type"]."<br>";
		echo "Size file: ".$_FILES["file"]["size"]."<br>";
		echo "Path file: ".$_FILES["file"]["tmp_name"]."<br>";
	}
	if(file_exists("upload/".$_FILES["file"]["name"])){
		echo $_FILES["file"]["name"]." already exists!";
	}
	else{
	move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);//move_uploaded_file(file,newlocation)
	echo "File in path ".$_FILES["file"]["tmp_name"];
	}
}
else{
echo "Invalid file";
}
?>