<?php
    //--- Giu gia tri cua form
    $username = array(
                        'name'        => 'username',
                        'id'          => 'username',
                        'size'        => '32',
                        'value'       => set_value('username'),
                    );
                             
    $password = array(
                        'name'        => 'password',
                        'id'          => 'password',
                        'size'        => '32',
                        'value'       => set_value('password'),
                    );
    $email = array(
                        'name'        => 'email',
                        'id'          => 'email',
                        'size'        => '32',
                        'value'       => set_value('email'),
                    );                
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add New Admin Page</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!--header-->
	<?php $this->load->view("admin/header_view");?>
	<!-- end-header-->
	<div id="content">
	<!-- top menu-->
	<?php $this->load->view("admin/topmenu_view");?>
	<!--end top-menu-->
	<div id="giua">
		<?php $this->load->view("admin/leftcontent_view");?>
		<div id="main-content">
		<div id="title">
		<h2>Add New Admin</h2>
		</div>
		<div id="table-vocabulary">
		<center>
			<div class="error">
		        <ul>
		            <?php
		                echo validation_errors('<li>','</li>');
		                if($error!="" && !empty($error))
		                    echo $error;
		            ?>
		        </ul>
		    </div>
			<form name="addNewAdmin" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>Username: </label><?php echo form_input($username);?><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>Password: </label><?php echo form_password($password);?><font width="1%" style="color:red;">(*)</font><br /><br />		        
		        <label>Role: </label>
		        	<select name="role" style="width:223px">		                    
		                    <option value="1">Administrator</option>
		                </select><font width="1%" style="color:red;">(*)</font><br /><br />		                
		        <label>Email: </label><?php echo form_input($email);?><font width="1%" style="color:red;">(*)</font><br /><br />		        
		        <label>&nbsp;</label> <input type="submit" name="ok" value="Register" style="margin-right:180px" /><br /><br />
		    </form>
			</center>
		</div>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>