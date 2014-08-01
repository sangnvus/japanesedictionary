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
 <div align="left" style="margin-left:200px;margin-top:30px;"><font size="5" color="blue">Đăng ký tài khoản mới</font></div>
 <?php echo form_open("Home/user/registration"); ?>
 <br>
 <table align="left" style="margin-left:20px;font-size:14px;" cellpadding="15">
  <tr>
  <td width="30%"><label for="user_name"><b>Tên đăng nhập:</b></label></td>
  <td width="35%"><input type="text" id="user_name" name="user_name" size="40" value="<?php echo set_value('user_name'); ?>" /></td>
  <td width="1%" style="color:red;">(*)</td>
  <td width="30%"><?php echo form_error('user_name', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="password"><b>Mật khẩu:</b></label></td>
  <td><input type="password" id="password" name="password" size="40" value="<?php echo set_value('password'); ?>" /></td>
  <td width="1%" style="color:red;">(*)</td>
  <td><?php echo form_error('password', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="con_password"><b>Nhập lại mật khẩu:</b></label></td>
  <td><input type="password" id="con_password" name="con_password" size="40" value="<?php echo set_value('con_password'); ?>" /></td>
  <td width="1%" style="color:red;">(*)</td>
  <td><?php echo form_error('con_password', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="email_address"><b>Email:</b></label></td>
  <td><input type="text" id="email_address" name="email_address" size="40" value="<?php echo set_value('email_address'); ?>" /></td>
  <td width="1%" style="color:red;">(*)</td>
  <td><?php echo form_error('email_address', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="full_name"><b>Họ và tên:</b></label></td>
  <td><input type="text" id="full_name" name="full_name" size="40" maxlength="100" value="<?php echo set_value('full_name'); ?>" /></td>
  </tr>
  <tr>
    <td><label for="captcha"><b>Mã xác nhận:</b></label></td>
    <td><?php echo $this->recaptcha->getHtml(); ?></td>
    <td width="1%" style="color:red;">(*)</td>
    <td><?php echo form_error('recaptcha_response_field', '<font color="blue">', '</font>'); ?></td>
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