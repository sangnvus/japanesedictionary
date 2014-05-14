<?php
// a two demensional array
$address=array(
array("ThaiBinh","VuTHu","VietThuan"),
array("Hanoi","TuLiem","CoNhue"),
array("Tokyo","Shinjiku","TruongTieng")
);
echo "Tinh " .$address[0][0]." Huyen " .$address[0][1]. " xa ".$address[0][2]."<br>";
echo "Tinh " .$address[1][0]." Huyen " .$address[1][1]. " xa ".$address[1][2]."<br>";
echo "Thanh Pho " .$address[2][0]." Dai hoc " .$address[2][1]. " ".$address[2][2]."<br>";
?>