<?php
session_start();

?>
<html>
<body>
<?php
if(isset($_SESSION["views"])){
	$_SESSION["views"]=$_SESSION["views"]+1;
}
else $_SESSION["views"]=1;
//session_destroy();
//unset($_SESSION[views]);
echo "page views = ".$_SESSION["views"];
?>
</body>
</html>