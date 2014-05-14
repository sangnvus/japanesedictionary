<?php
// Create connection 
$con=mysqli_connect("127.0.0.1", "root","","my_db");//host, user,pass,dbname

//check connection
if(mysqli_connect_errno($con)){
	echo "Fail connect to" .mysqli_connect_error();
}
else 
echo "connect!<BR>";

//Create Database
///$sql="CREATE DATABASE my_db";
//if(mysqli_query($con,$sql)){echo "Create DB success!<br>";}
//else echo "FAIL CREATED!".mysqli_error($con)."<br>";

//Create table
//$sql2="CREATE TABLE Student(Name CHAR(30), ID INT)";

//Execute query
mysqli_query($con,"INSERT INTO Student(Name, ID) VALUES ('Cuong',23)");
echo "new record!<br>";

//if(mysqli_query($con,$sql2)){
	//echo "Table created successly!<br>";
//}
//else echo "Table created fail!<br>";


mysqli_close($con);

?>