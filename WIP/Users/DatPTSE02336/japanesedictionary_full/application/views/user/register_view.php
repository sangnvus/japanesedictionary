<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<title></title>
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
							<meta charset="utf-8">
<div align="center">
<div align="left" style="margin-left:40px;margin-top:50px"><font size="4" color="blue">Cách 1: Đăng ký qua tài khoản cá nhân</font></div><br>
      <div align="left" style="margin-left:100px;margin-top:0px">
          <a href="#"><img src="images/gmail.png" width="120" height="40"></a>
          <a href="https://www.facebook.com/dialog/oauth?client_id=509011619175617&redirect_uri=http://localhost/register-captcha/callback.php"><img src="images/facebook.png" width="80" height="40" /></a>
      </div>
 <div align="left" style="margin-left:40px;margin-top:15px;"><font size="4" color="blue">Cách 2: Đăng ký tài khoản mới</font></div>
 <?php echo form_open("Home/user/registration"); ?>
 <table align="left" style="margin-left:30px;" cellpadding="15">
  <tr>
  <td><label for="user_name"><b>Tên đăng nhập:</b></label></td>
  <td><input type="text" id="user_name" name="user_name" size="40" value="<?php echo set_value('user_name'); ?>" /></td>
  <td><?php echo form_error('user_name', '<font color="blue">', '</font>'); ?></td>
  </tr></td>
  </tr>
  <tr>
  <td><label for="password"><b>Mật khẩu:</b></label></td>
  <td><input type="password" id="password" name="password" size="40" value="<?php echo set_value('password'); ?>" /></td>
  <td><?php echo form_error('password', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="con_password"><b>Nhập lại mật khẩu:</b></label></td>
  <td><input type="password" id="con_password" name="con_password" size="40" value="<?php echo set_value('con_password'); ?>" /></td>
  <td><?php echo form_error('con_password', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="email_address"><b>Email:</b></label></td>
  <td><input type="text" id="email_address" name="email_address" size="40" value="<?php echo set_value('email_address'); ?>" /></td>
  <td><?php echo form_error('email_address', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="full_name"><b>Họ và tên:</b></label></td>
  <td><input type="text" id="full_name" name="full_name" size="40" value="<?php echo set_value('full_name'); ?>" /></td>
  <td><?php echo form_error('full_name', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
    <td><label for="captcha"><b>Mã xác nhận:</b></label></td>
    <td><?php echo $this->recaptcha->getHtml(); ?></td>
    <td><?php echo form_error('recaptcha_response_field', '<font color="blue">', '</font>'); ?></td>
    <!--
    <?php echo $Data; ?>-->
  </tr>
  <tr>
  <td></td>
  <td><input id="btnSearch" type="submit" value="Đăng ký" /></td>
  </tr>
  </table>
 	<?php echo form_close(); ?>			
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