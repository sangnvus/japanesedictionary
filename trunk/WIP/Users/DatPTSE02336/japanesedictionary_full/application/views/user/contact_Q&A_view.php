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

							<h2 id="arc-title" style="margin-top:15px;font-size:40px">Q&A</h2>
                    <div>
                      <?php echo form_open("Home/user/attributeQA"); ?>
                        <table>
                            <tr>
                            <td><label for="contact_email"><b>Nhập Email:</b></label></td>
                            <td><input type="text" id="contact_email" name="contact_email" placeholder="Email để nhận phản hồi" size="50" value="<?php echo set_value('contact_email'); ?>" /></td>
                            <td><?php echo form_error('contact_email', '<font color="blue">', '</font>'); ?></td>
                            </tr>
                            <tr>
                               <td><label for="contact_content"><b>Nhập nội dung:</b></label></td>
                                <td><textarea rows="10" cols="50" id="contact_content" name="contact_content" placeholder="Nội dung muốn đóng góp" value="<?php echo set_value('contact_content'); ?>"></textarea></td>

                            </tr>
                            <tr>
                              <td><label for="captcha"><b>Mã xác nhận:</b></label></td>
                              <td><?php echo $this->recaptcha->getHtml(); ?></td>
                              <td><?php echo form_error('recaptcha_response_field', '<font color="blue">', '</font>'); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input id="btnSearch" type="submit" value="Đóng góp"></td>
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