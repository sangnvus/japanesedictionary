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
                        'readonly'    => 'readonly'
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
		<h2>Edit Admin</h2>
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
		        <table  border="0" cellpadding="10" id="table1">
					<tr align="left">
						<td width="40%">UserName:</td>
						<td width="50%"><?php echo form_input($username);?></td>
						<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
					</tr>
					<tr align="left">
						<td width="40%">Password:</td>
						<td width="50%"><?php echo form_password($password);?></td>
						<td width="10%"></td>
					</tr>
					<tr align="left">
						<td width="40%">New-password:</td>
						<td width="50%"><?php echo form_password($newpassword);?></td>
						<td width="10%"></td>
					</tr>
					<tr align="left">
						<td width="40%">Renew-password:</td>
						<td width="50%"><?php echo form_password($renewpassword);?></td>
						<td width="10%"></td>
					</tr>
		        	<tr align="left">
						<td width="40%">FullName:</td>
						<td width="50%"><?php echo form_input($fullname);?></td>
						<td width="10%"></td>
					</tr>
					<tr align="left">
						<td width="40%">Email:</td>
						<td width="50%"><?php echo form_input($email);?></td>
						<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
					</tr>		      	        
		       		<tr>
					<td></td>
					<td><input type="submit" name="ok" value="Update" /></td>
					<td></td>
				</tr>		
		    	</table>			        
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