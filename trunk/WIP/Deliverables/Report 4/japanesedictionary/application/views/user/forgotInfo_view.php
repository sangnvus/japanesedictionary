<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	<title>Quên mật khẩu</title>
</head>
<body>
<div id="container">
		<?php 
			if ($this->my_auth->is_User()) {
				$this->load->view("user/top_login_view");
			} else {
				$user = $this->facebook->getUser();    
		        if ($user) {
		            $data['logout_url'] = site_url('Home/verify/fblogout'); // Logs off application
		            $data['user_profile'] = $this->facebook->api('/me');
		            // OR 
		            // Logs off FB!
		            // $data['logout_url'] = $this->facebook->getLogoutUrl();
		            $this->load->view("user/top_view",$data); 
		        } else {
		            $data['login_url'] = $this->facebook->getLoginUrl(array(
		                'redirect_uri' => site_url('Home/verify/fblogin'), 
		                'scope' => array("email") // permissions here
		            ));
		            $this->load->view("user/top_view",$data); 
		        } 								
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
				<form method="post" id="form" action="doforget" style="margin-top:10px">
				<fieldset>
	          	<legend style="color:blue; font-size:20px;">Quên mật khẩu </legend>		
				<div style="margin-top:20px;">
					<label for="email"><b>Nhập email :</b></label>
					<input class="box" type="text" id="email" size="40" name="email"/>
					<label width="1%" style="color:red;">(*)</label>
				</div>
				<div style="margin-top:20px;">
					<input type="submit" id="btnSearch" value="Đồng ý" />
				</div>
				<?php if( isset($info)): ?>
					<div style="margin-top:20px;color: blue;" >
						<?php echo("Mật khẩu được làm mới và gửi đến địa chỉ mail: ".$info) ?>
					</div>
				<?php elseif( isset($error)): ?>
					<div style="margin-top:20px;color: blue;">
						<?php echo "Địa chỉ email không tồn tại trong database"?>
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