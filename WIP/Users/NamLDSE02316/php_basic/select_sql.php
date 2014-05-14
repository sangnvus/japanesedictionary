<?php
$con=mysqli_connect("127.0.0.1","root","","my_db");
if(mysqli_connect_error()){
	echo "Connect fail ".mysqli_connect_error();
}
else 
$result=mysqli_query($con,"SELECT * FROM Student");
// Delete FROM table_name WHERE some_column= some_value;
// UPDATE table_name SET column1=value, column2=value2... WHERE some_column=some_vulue;
echo "<table border='1'
<tr>
<th>Name Student</th>
<th>ID Student</th>
</tr>
";
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<th>".$row['Name']."</th>";
echo "<th>".$row['ID']."</th>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);

?>