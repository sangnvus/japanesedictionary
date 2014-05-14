<?php
echo "Hello world <br>";
echo "Hello world <br>";
$x=5;
$y=10;
echo "Number x: $x"; 
echo "<br>";
echo "Number y: $y";
echo "<br>";

function myTest(){
	$GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
	echo "new number: " .$GLOBALS['y'];
}
myTest();
$color="blue";
echo "Color is blue " .$color. " Visual";

function math(){
	static $so=0;
	echo "$so";
	echo "<br>";
	$so++;
}
math();
math();
math();
	echo "<br>";
	
	echo "A"," "," B";
	
	$subject=array("Toan","Van","Anh");
	echo $subject[0];
	print $subject[1];
	print "<br>";
	print_r ($subject);
	
	
	print "<h1>HELLO!!</h1>";
	var_dump ($subject);
	echo "<br>";
	var_dump ($color);
	$n=null;
	echo "<br>";
	var_dump ($n);
	echo "<br>";
	echo strlen($color);
	//$text="Nguyen Manh Cuong";
	echo "<br>";
	echo strpos("Nguyen","yen");
	echo "<br>";
	define("WELCOME","Viet Nam",true);
	echo welcome;
 ?>
 