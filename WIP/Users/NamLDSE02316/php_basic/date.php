<?php
echo "Today is ".date("Y.m.d")."<br>";
echo "Today is ".date("d-m-Y")."<br>";
echo "Today is ".date("m/d/Y")."<br>";

//mktime(hour,minutes,seconds, month, day, year, is_dst-GMT)
$tomorrow= mktime(0,0,0,date("m"),date("d")+1,date("year"));
echo "Tomorrow is ".date("Y-m-d",$tomorrow);
?>
