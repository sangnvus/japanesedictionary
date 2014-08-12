<?php
    $username = array(
                        'name'        => 'username',
                        'id'          => 'username',
                        'size'        => '32',
                        'maxlength'	  =>'32',
                    );
    $password = array(
                        'name'        => 'password',
                        'id'          => 'password',
                        'size'        => '32',
                        'maxlength'	  =>'32',
                    );
    $submit = array(
                        "name"=>"ok",
                        "value"=>"OK",
                    );
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Dang nhap he thong</title>
	<link href="<?php echo base_url();?>public/css/admin/style_admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div align="center">
<?php 
	echo form_open(base_url()."index.php/admin/verify/login");
 ?>
<fieldset class="login_system">
	<legend>Đăng nhập</legend>
	<?php  
		echo form_label("Tên : ").form_input($username)."<br/>";
	    echo form_label("Mật khẩu : ").form_password($password)."<br/>";
	    echo form_label("&nbsp").form_submit($submit)."<br/>";
	    //--------------- ERROR
	    echo "<br>";
	    echo "<br>";
	    echo "<br>";
	    echo "<label>&nbsp;</label><span class=error>";
	        echo validation_errors();
	        if($error!="")
	     	 echo $error;
	    echo "</span>";
	    //-----------------------
	?>

</fieldset>
<?php echo form_close(); ?>	
<div class="copyright">Bản quyền © 2014 - 2014 <a href="http://www.fpt.edu.vn" target="_blank">FPT University</a></div>
</div>
</body>
</html>