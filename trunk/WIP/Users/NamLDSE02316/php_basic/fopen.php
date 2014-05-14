<?php
$file=fopen("Test_fopen.txt","r") or exit ("unable to open file!");
//echo $file;
//Reading file line by line fgets
while(!feof($file)){
	//echo fgets($file)."<br>";//reading line
	echo fgetc($file)." ";// reading by character
}

If(feof($file)) echo "<br> End of file.";
fclose($file);
?>