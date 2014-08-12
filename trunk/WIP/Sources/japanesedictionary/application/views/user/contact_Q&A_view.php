<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
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

							<h1 style="color:blue; font-size:25px;">Q&A</h1>
                    <div>
                      <?php echo form_open("Home/user/attributeQA"); ?>
                        <table align="left" style="margin-left:20px;font-size:14px;" cellpadding="15">
                            <tr>
	                            <td width="25%"><label for="contact_email"><b>Nhập Email:</b></label></td>
	                            <td width="40%"><input type="text" id="contact_email" name="contact_email" placeholder="Email để nhận phản hồi" size="45" value="<?php echo set_value('contact_email'); ?>" /></td>
	                            <td width="1%" style="color:red;">(*)</td>
	                            <td width="30%"><?php echo form_error('contact_email', '<font color="blue">', '</font>'); ?></td>
                            </tr>
                            <tr>
                               	<td><label for="contact_content"><b>Nhập nội dung:</b></label></td>
                                <td><textarea rows="10" cols="35"  id="contact_content" name="contact_content" placeholder="Nội dung muốn đóng góp" value="<?php echo set_value('contact_content'); ?>"></textarea></td>
                                <td width="1%" style="color:red;">(*)</td>
                                <td width="30%"><?php echo form_error('contact_content', '<font color="blue">', '</font>'); ?></td>
                                

                            </tr>
                            <tr>
                              	<td><label for="captcha"><b>Mã xác nhận:</b></label></td>
                              	<td><?php echo $this->recaptcha->getHtml(); ?></td>
                              	<td width="1%" style="color:red;">(*)</td>
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