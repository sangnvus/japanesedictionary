<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
</form>
<?php
$n= $_REQUEST['fname'];
echo $n;
?>
<!-- $_REQUEST is used to collect data after submitting an HTML form -->
</body>
</html>