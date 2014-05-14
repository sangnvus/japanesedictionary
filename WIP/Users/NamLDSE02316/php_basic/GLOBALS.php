<?php
$x=10;
$y=20;
function sum(){
$GLOBALS['z']=$GLOBALS['x']+$GLOBALS['y'];
//return $z;
}
sum();
echo $z;
?>
//z is a variable present within the $GLOBALS array, it is also accessible form outside the function!
// Z  is a variable present within the $GLOBALS array, it is also accessible form outside the function!
