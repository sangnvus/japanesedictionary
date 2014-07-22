<?php
    //--- Giu gia tri cua form

    $username = array(
                        'name'        => 'username',
                        'id'          => 'username',
                        'size'        => '32',
                        'value'       => $info["u_username"],
                        'readonly'    => 'readonly'
                    );

    $password = array(
                        'name'        => 'password',
                        'id'          => 'password',
                        'size'        => '32',
                        'value'       => $info['u_password'],
                    );

    $newpassword = array(
                        'name'        => 'newpassword',
                        'id'          => 'newpassword',
                        'size'        => '32',
                        'value'       => set_value('newpassword'),
                    );
    $renewpassword = array(
                        'name'        => 'renewpassword',
                        'id'          => 'renewpassword',
                        'size'        => '32',
                        'value'       => set_value('renewpassword'),
                    );
    $fullname = array(
                        "name"  => "fullname",
                        "id"    => "fullname",
                        'size'        => '32',                        
                        "value" => $info["u_fullname"]
                    );
    $email = array(
                        'name'        => 'email',
                        'id'          => 'email',                        
                        'size'        => '32',
                        'value'       => $info["u_email"],
                    );
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
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
			<form name="editAdmin" id="editAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>U_username: </label><?php echo form_input($username);?><br/>
		        <label>U_password: </label><?php echo form_password($password);?><br/>
		        <label>New-password: </label><?php echo form_password($newpassword);?><br />
		        <label>Renew-password: </label><?php echo form_password($renewpassword);?><br />
		        <label>U_fullname</label><?php echo form_input($fullname);?><br />	      
		        <label>U_email: </label><?php echo form_input($email);?><br />		        
		        <label>&nbsp;</label> <input type="submit" name="ok" value="Upadte" /><br />			        
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