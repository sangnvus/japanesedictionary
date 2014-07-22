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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<title>Web học tiếng Nhật</title>
</head>
<body>
<div id="container">
		<?php 
            if ($this->my_auth->is_User()) {
                $this->load->view("user/top_login_view");
            } else {
                $this->load->view("user/top_view");
            }
            
         ?> 	
	<div id="content">
		<?php $this->load->view("user/mainmenu_view");?>
		<div id="noidung">
			<center>
				<?php $this->load->view("user/search_view");?>
				<div id="main-content">
					<div id="left-content">
						<div id="intro-content">
        <h1 style="color:blue">Thay đổi thông tin</h1>
        
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
            <form name="editUser" id="editUser" action="" method="post" enctype="multipart-formdata">
            <table style="" cellspacing="15">
                <tr>
                    <td><label><b>Tên đăng nhập: </b></label></td>
                    <td><?php echo form_input($username);?></td>
                </tr>
                <tr>
                    <td><label><b>Mật khẩu cũ: </label></td>
                    <td><?php echo form_password($password);?></td>
                </tr> 
                <tr>
                    <td><label><b>Mật khẩu mới: </label></td>
                    <td><?php echo form_password($newpassword);?></td>
                </tr> 
                <tr>
                    <td><label><b>Nhập lại mật khẩu mới: </label></td>
                    <td><?php echo form_password($renewpassword);?></td>
                </tr> 
                <tr>
                    <td><label><b>Họ và tên</label></td>
                    <td><?php echo form_input($fullname);?></td>
                </tr>                              
                <tr>
                    <td><label><b>Email:</label></td>
                    <td><?php echo form_input($email);?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><label>&nbsp;</label> <input id="btnSearch" type="submit" name="ok" value="Update" /></td>
                </tr>                  
                                   
            </table>
            </form>
            </center>
						</div>
                        </div>
					</div>
					<?php $this->load->view("user/popup_view");?>			
				</div>
			<div style="clear:both"></div>
			</center>
		</div>
	</div>
		<?php $this->load->view("user/footer_view");?>
</div>
	
</body>
</html>