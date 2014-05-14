<html>
<body>
<form method="post" action ="<?php echo $_SERVER['PHP_SELF'];?>">
Name:<input type='text' name='fname'>
<input type='submit'>

</form>
<?php
$p= $_POST['fname'];
echo $p;
?>
<!-- $_POST is widely used to collect form data after submitting an HTML form with method ="post". $_POST is also widely used to pass variables-->
</body>
</html>