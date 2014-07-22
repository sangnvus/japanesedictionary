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
				<form method="post" id="form" action="doforget">
				<fieldset>
	          	<legend style="color:blue; font-size:20px;">Reset password</legend>		
				<div style="margin-top:20px;">
					<label for="email"><b>Nhập email :</b></label>
					<input class="box" type="text" id="email" size="40" name="email"/>
				</div>
				<div style="margin-top:20px;">
					<input type="submit" id="btnSearch" value="Đồng ý" />
				</div>
				<?php if( isset($info)): ?>
					<div style="margin-top:20px;color: blue;" >
						<?php echo($info) ?>
					</div>
				<?php elseif( isset($error)): ?>
					<div style="margin-top:20px;color: blue;">
						<?php echo($error) ?>
					</div>
				<?php endif; ?>	
			</fieldset>
		</form>	
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